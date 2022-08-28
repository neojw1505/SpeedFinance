<?php

namespace App\Http\Controllers;

use App\Application;
use App\Application_Checklist;
use App\Checklist;
use App\File;
use Illuminate\Support\Facades\DB;
use Vinkla\Hashids\Facades\Hashids;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;

class ChecklistController extends Controller
{


    //this is redirect if user is not logged in
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Application $application, Request $request)
    {
        $this->authorize('manager-rm');
        // if not the user who created and also not a manager -> abort 403
        if ($application->user_id !== Auth::user()->id && Auth::user()->id !== 3) {
            abort(403);
        }
        $notUploaded = Application_Checklist::with('files')->whereDoesntHave('files')->where('application_id', '=', $application->id)->get();
        $uploaded = Application_Checklist::with('files')->has('files')->where('application_id', '=', $application->id)->get();
        return view('checklist.index', compact('notUploaded', 'uploaded', 'application'));
    }
    // add new checklist into database
    public function add(Request $request)
    {
        $this->authorize('admin-manager');
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:checklists']
        ]);
        if ($request->has('checklistType')) {
            $checklistType = true;
        } else {
            $checklistType = false;
        }
        $checklist = Checklist::create([
            'name' => $request->name,
            'category' => $request->category,
            'isMandatory' => $checklistType
        ]);
        $audit_controller = new AuditController;
        $audit_controller->create('Create Checklist', "Created Checklist " . '"' . $checklist->name .  '"' . " by " . Auth::user()->name);    
        return redirect()->route('viewChecklist')->with('toast-success', 'Checklist Created');
    }

    // go to checklist creation page
    public function create()
    {
        $this->authorize('admin-manager');
        return view('checklist.create');
    }

    // view all the available checklist 
    public function view()
    {
        $this->authorize('admin-manager');
        $checklists = Checklist::all();
        return view('checklist.view', compact('checklists'));
    }

    // go to checklist edit page
    public function edit(Checklist $checklist)
    {
        $this->authorize('admin-manager');
        $categories = DB::table('checklists')->where('category', '!=', $checklist->category)->pluck('category')->unique();
        return view('checklist.edit', compact('checklist', 'categories'));
    }

    // update checklist with new details
    public function update(Request $request, Checklist $checklist)
    {
        $this->authorize('admin-manager');
        $request->validate([
            'name' => ['required', 'string', 'max:255']
        ]);
        if ($request->has('checklistType')) {
            $checklistType = true;
        } else {
            $checklistType = false;
        }
        $orgName = $checklist->name;
        $orgCategory = $checklist->category;
        $orgType = $checklist->isMandatory;

        $checklist->update([
            'name' => $request->name,
            'category' => $request->category,
            'isMandatory' => $checklistType
        ]);

        $audit_controller = new AuditController;
        if ($request->name != $orgName){
            $audit_controller->create('Update Checklist', "Checklist #" . $checklist->id ." Name " . '"' . $orgName .  '"' . " updated to " . '"' . $request->name . '"' . " by " . Auth::user()->name);
        } 
        if ($request->category != $orgCategory) {
            $audit_controller->create('Update Checklist', "Checklist #". $checklist->id ." Category " . '"' . $orgCategory .  '"' . " updated to " . '"' . $request->category . '"' . " by " . Auth::user()->name);
        } 
        if(($orgType == 1 && $checklistType == false) || ($orgType == 0 && $checklistType == true)){
            if ($checklistType == true) {
                $orgType = "Not Mandatory";
                $request->checklistType = "Mandatory";
                $audit_controller->create('Update Checklist', "Checklist #". $checklist->id ." Type " . '"' . $orgType .  '"' . " updated to " . '"' . $request->checklistType . '"' . " by " . Auth::user()->name);
            } else {
                $orgType = "Mandatory";
                $request->checklistType = "Not Mandatory";
                $audit_controller->create('Update Checklist', "Checklist #". $checklist->id ." Type " . '"' . $orgType .  '"' . " updated to " . '"' . $request->checklistType . '"' . " by " . Auth::user()->name);
        } 
    }
        return redirect(route('viewChecklist'))->with('toast-success', 'Checklist Updated');
}
    // remove the checklist permanently from database
    public function remove(Checklist $checklist)
    {
        $this->authorize('admin-manager');
        // if(in_array($checklist->name, array('Construction' , 'Food & Beverages' , 'Retail'))){
        //     return redirect()->back()->with('toast-error', 'Unable to remove due to checklist conditions being tied to this checklist');
        // }else if($checklist->applications()->exists()){
        //     return redirect()->back()->with('toast-error', 'Unable to remove as there are existing applications tied to this checklist');
        // }else{
        $checklist->delete();
        $audit_controller = new AuditController;
        $audit_controller->create('Delete Checklist', "Deleted Checklist #". $checklist->id ." by " . Auth::user()->name);
        return redirect()->route('viewChecklist')->with('toast-success', 'Checklist Deleted');
        // }
    }
    /**
     * Display a listing of the completed resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function completed(Request $request)
    {
        $this->authorize('manager-rm');
        $application = Application::find($request->appId);
        $uploaded = Application_Checklist::with('files')->has('files')->where('application_id', '=', $application->id)->get();
        return view('checklist.completed', compact('uploaded', 'application'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generate(Application $application)
    {
        $this->authorize('manager-rm');
        if (Auth::user()->isRm() && $application->user_id !== Auth::user()->id) {
            abort(403);
        }
        return URL::signedRoute(
            'guestForm',
            compact('application')
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('manager-rm');
        $hashedId = Hashids::connection(\App\Application::class)->encode($request->appId);
        $application = Application::find($request->appId);
        if ($application->user_id !== Auth::user()->id) {
            abort(403);
        }
        $files = $request->file('file');
        foreach ($files as $file) {
            $filename = $file->getClientOriginalName();
            $filename = md5($filename);
            $filename = microtime(true) . $filename . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs(env('AWS_FOLDER') . $hashedId, $filename, 's3');

            File::create([
                'application_checklist_id' => $request->id,
                'path' => $path,
                'name' => $file->getClientOriginalName()
            ]);
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Checklist  $checklist
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        if (Auth::user()->isRm() && $file->application_checklist->application->user_id !== Auth::user()->id) {
            abort(403);
        }
        $path = $file->path;
        return Storage::disk('s3')->response($path);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Checklist  $checklist
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {
        $this->authorize('manager-rm');
        if ($file->application_checklist->application->user_id !== Auth::user()->id) {
            abort(403);
        }
        $path = $file->path;
        if (Storage::disk('s3')->exists($path)) {
            if (Storage::disk('s3')->delete($path)) {
                $file->delete();
                return redirect()->back()->with('toast-success', 'Successfully deleted File');
            } else {
                return redirect()->back()->with('toast-error', 'Error occured when deleting File');
            }
        } else {
            return redirect()->back()->with('toast-error', 'Error occured when deleting File');
        }
    }
}
