<?php

namespace App\Http\Controllers;

use App\Application;
use App\Application_Checklist;
use App\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Vinkla\Hashids\Facades\Hashids;

class GuestController extends Controller
{
  

    //this is redirect if user is not logged in
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        if (! $request->hasValidSignature()) {
            abort(401);
        }

    }
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Application $application, Request $request)
    {   
        $notUploaded = Application_Checklist::with('files')->whereDoesntHave('files')->where('application_id', '=', $application->id)->get();
        $uploaded = Application_Checklist::with('files')->has('files')->where('application_id', '=', $application->id)->get();
        $url = URL::temporarySignedRoute(
        'guestStore', now()->addMinutes(30)
        );

        foreach ($uploaded as $upload) {
            foreach ($upload->files as $file) {
                $viewUrl = URL::temporarySignedRoute(
                    'guestView', now()->addMinutes(30), compact('file')
                );
                $delUrl = URL::temporarySignedRoute(
                    'guestDelete', now()->addMinutes(30), compact('file')
                );
                $file->viewUrl = $viewUrl;
                $file->delUrl = $delUrl;
            }
        }

        return view('guest.upload', compact('notUploaded','uploaded', 'application', 'url'));
    }

    public function guestForm(Application $application, Request $request)
    {
            $url = URL::signedRoute(
                'guestAuth', compact('application')
            );
            return view('guest.authenticate', compact('application', 'url'));
        
    }

    public function guestAuth(Application $application, Request $request)
    {
        if($request->uen === $application->company->uen){
            $url = URL::temporarySignedRoute(
                'guestUpload', now()->addMinutes(30), compact('application')
            );
            return Redirect::to($url);
        } else {
            $message = 'UEN number does not match, try again.';
            return redirect()->back()->withMessage($message);
        }
    }

        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $hashedId = Hashids::connection('main')->encode($request->appId);
        $application = Application::find($request->appId);
        $files = $request->file('file');
        foreach($files as $file){
            $filename = $file->getClientOriginalName();
            $filename = md5($filename);
            $filename = microtime().$filename.'.'.$file->getClientOriginalExtension();
            $path = $file->storeAs(env('AWS_FOLDER').$hashedId, $filename, 's3');

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
        $path = $file->path;
        if(Storage::disk('s3')->exists($path)){
            if(Storage::disk('s3')->delete($path)){
                $file->delete();
                return redirect()->back()->with('toast-success', 'Successfully deleted File');
                
            }else{
                return redirect()->back()->with('toast-error', 'Error occured when deleting File');
            }
        }else {
            return redirect()->back()->with('toast-error', 'Error occured when deleting File');
        }
        
    }


}
