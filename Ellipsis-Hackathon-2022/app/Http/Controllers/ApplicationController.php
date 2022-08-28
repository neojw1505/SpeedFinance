<?php

namespace App\Http\Controllers;

use App\Application;
use App\Application_Approver;
use App\Application_Checklist;
use App\Approver;
use App\Checklist;
use App\Company;
use App\Role;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class ApplicationController extends Controller
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
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Application $application)
    {
        $pastReminders = $application->reminders()->where('dateTime', '<', Carbon::now())->paginate(3)->sortBy('dateTime');
        $upcomingReminders = $application->reminders()->where('dateTime', '>=', Carbon::now())->paginate(3)->sortBy('dateTime');
        $notes = $application->notes->sortByDesc('updated_at');
        $uploaded = Application_Checklist::with('files')->has('files')->where('application_id', '=', $application->id)->get();
        $pivot = null;
        if (Auth::user()->isApprover()) {
            $this->authorize('active-approvers');
            $pivot = Application_Approver::where('application_id', '=', $application->id)->where('approver_id', '=', Auth::user()->approver->id)->first();
        } else if (Auth::user()->isRm() && $application->user_id !== Auth::user()->id) {
            abort(403);
        }
        return view('application.show', compact('application', 'uploaded', 'notes', 'pastReminders', 'upcomingReminders', 'pivot'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list(Application $application)
    {
        if (Auth::user()->isManager() || Auth::user()->isAdmin()) {
            $applications = Application::all()->sortBy('created_at');
            return view('application.list', compact('applications'));
        } else if (Auth::user()->isApprover()) {
            $applications = Application::whereHas('approvers', function (Builder $q) {
                $q->where('application_approver.approver_id', '=', Auth::user()->approver->id)
                    ->where('application_approver.status', '=', 'pending');
            })->where('status', '=', 'pending')->get()->sortBy('created_at');
            $oldApps = Application::whereHas('approvers', function (Builder $q) {
                $q->where('application_approver.approver_id', '=', Auth::user()->approver->id)
                    ->where('application_approver.status', '!=', 'pending');
            })->get();
            return view('application.list', compact('applications', 'oldApps'));
        } else if (Auth::user()->isRm()) {
            $applications = Application::where('user_id', '=', Auth::user()->id)->orderBy('created_at', 'desc')->get();
            return view('application.list', compact('applications'));
        } else {
            abort(401);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function loadCreate(Company $company = null)
    {
        $users = User::all();

        $this->authorize('manager-rm');
        if (!isset($company)) {
            $companies = Company::all();
        } else {
            $companies = null;
        }
        if (!isset($company) && $companies->isEmpty()) {
            return redirect()->route('createCompany')->with('toast-warning', 'A Company has to be created first before Application can be created. Redirecting you to Create Company');
        }
        return view('application.load', compact('company', 'users', 'companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('manager-rm');
        $request->validate([
            'loant' => ['required', 'integer'],
            'loanamt' => ['required', 'regex:/^\d+(\.\d{1,2})?$/'],
            'interest' => ['required', 'regex:/^\d+(\.\d{1,2})?$/'],
            'ltype' => ['required', 'string'],
            'itype' => ['required', 'string'],
            'origination' => ['required', 'regex:/^\d+(\.\d{1,2})?$/'],
            'cname' => ['nullable', 'string', 'max:255'],
            'ccompany' => ['nullable', 'string', 'max:255'],
            'ccontact' => ['nullable', 'string', 'max:255'],
            'remark' => ['nullable', 'string']
        ]);

        $company = Company::findOrFail($request->companyid);
        $mandatoryChecklists = Checklist::where('isMandatory', '=', true)->get();
        if ($request->loanamt <= 40000) {
            $otherChecklists = Checklist::where('isMandatory', '=', false)->get();
        } else if ($company->gst_registered) {
            $otherChecklists = Checklist::where('isMandatory', '=', false)
                ->orWhere('category', '=', 'GST')
                ->orWhere('category', '=', 'above 40k')->get();
        } else if (!$company->gst_registered) {
            $otherChecklists = Checklist::where('isMandatory', '=', false)
                ->orWhere('category', '=', 'above 40k')->get();
        }

        $appDetails = $request->input();

        return view('application.create', compact('mandatoryChecklists', 'otherChecklists', 'company', 'appDetails'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Company $company)
    {
        $this->authorize('manager-rm');

        $request->validate([
            'score' => ['required', 'string'],
        ]);

        $request->validate([
            'appDetails.loant' => ['required', 'integer', 'max:9999999'],
            'appDetails.ltype' => ['required', 'string'],
            'appDetails.itype' => ['required', 'string'],
            'appDetails.loanamt' => ['required', 'regex:/^\d+(\.\d{1,2})?$/'],
            'appDetails.interest' => ['required', 'regex:/^\d+(\.\d{1,2})?$/'],
            'appDetails.origination' => ['required', 'regex:/^\d+(\.\d{1,2})?$/'],
            'appDetails.cname' => ['nullable', 'string', 'max:255'],
            'appDetails.ccompany' => ['nullable', 'string', 'max:255'],
            'appDetails.ccontact' => ['nullable', 'string', 'max:255'],
            'appDetails.remark' => ['nullable', 'string']
        ]);

        if (Auth::user()->isManager()) {
            // if assignedUser is empty
            if (empty($request->appDetails['assignedUser'])) {
                $status = 'pending';
                $assignedUser = Auth::user()->id;
            }
            // if assignedUser is not empty
            else {
                $status = 'new';
                $assignedUser = $request->appDetails['assignedUser'];
            }
        } else {
            $status = 'new';
            $assignedUser = Auth::user()->id;
        }

        config('app.format_date_application_id');


        // get all records from db
        $existingId = Application::whereDate('created_at', '=', Carbon::today()->toDateString())->get()->pluck('application_id');
        $randNum = rand(10000, 99999);
        $idArray = array();

        foreach ($existingId as $id) {
            $subId = substr($id, -5, 5);
            array_push($idArray, $subId);
        }

        $appId = null;
        $count = 0;
        if (!empty($idArray)) { //idArray not empty
            while (true) {
                if (in_array($randNum, $idArray)) {
                    $randNum = rand(10000, 99999);
                } else {
                    $appId = "FT-" . Carbon::now()->format('ymd') . '-' . $randNum;
                    break;
                }

                if ($count > 10) {
                    break;
                }
                $count++;
            }
        } else { //idArray empty
            $randNum = rand(10000, 99999);
            $appId = "FT-" . Carbon::now()->format('ymd') . '-' . $randNum;
        }

        if ($appId == null) {
            return redirect(route('showCompany', $company))->with('toast-error', 'All application ID used up');
        }

        $application = Application::create([
            'application_id' => $appId,
            'company_id' => $company->id,
            'user_id' => $assignedUser,
            'created_by' => Auth::user()->id,
            'score' => $request->score,
            'status' => $status,
            'loan_type' => $request->appDetails['ltype'],
            'interest_type' => $request->appDetails['itype'],
            'loan_amt' => $request->appDetails['loanamt'],
            'loan_tenure' => $request->appDetails['loant'],
            'interest' => $request->appDetails['interest'],
            'origination_fee' => $request->appDetails['origination'],
            'consultant_company' => $request->appDetails['ccompany'],
            'consultant_contact' => $request->appDetails['ccontact'],
            'consultant_name' => $request->appDetails['cname'],
            'remark' => isset($request->appDetails['remark']) ? $request->appDetails['remark'] : ''
        ]);

        if ($request->checklist != NULL) {
            foreach ($request->checklist as $checklist) {
                $application->assignChecklist($checklist);
            }
        }
        $approvers = Approver::all();
        foreach ($approvers as $approver) {
            $approver->assignApplications($application);
            $pivot = Application_Approver::where([['approver_id', '=', $approver->id], ['application_id', '=', $application->id]]);
            if ($application->loan_amt > 40000) {
                $pivot->update([
                    'type' => 1
                ]);
            } else if ($application->loan_amt <= 40000) {
                $pivot->update([
                    'type' => 0
                ]);
            }
        }
        $audit_controller = new AuditController;
        $audit_controller->create('Create Application', "Application #" .$application->application_id . " is created by " . Auth::user()->name);
        return redirect(route('showCompany', $company))->with('toast-success', 'New Application Created');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function reassign(Application $application)
    {
        $this->authorize('admin-manager');
        $rm = Role::find(3);
        $users = $rm->users;
        return view('application.reassign', compact('application', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function updateAssignment(Request $request, Application $application)
    {
        $this->authorize('admin-manager');
        $request->validate([
            'user' => ['required'],
        ]);
        $username = DB::table('users')->select('name')->where('id','=',$request->user)->get();
        $application->update([
            'user_id' => $request->user
        ]);
        $audit_controller = new AuditController;
        $audit_controller->create('Reassign Application', "Application #" .$application->application_id . " is reassigned to " . $username[0]->name);
        return redirect(route('showCompany', $application->company))->with('toast-success', 'Application Reassigned');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function edit(Application $application)
    {
        $this->authorize('manager-rm');
        // if not the user who created and also not a manager -> abort 403
        if ($application->user_id !== Auth::user()->id && Auth::user()->id !== 3) {
            abort(403);
        }
        return view('application.edit', compact('application'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Application $application)
    {
        $this->authorize('manager-rm');
        // if not the user who created and also not a manager -> abort 403
        if ($application->user_id !== Auth::user()->id && Auth::user()->id !== 3) {
            abort(403);
        }
        $request->validate([
            'loant' => ['required', 'integer'],
            'loanamt' => ['required', 'regex:/^\d+(\.\d{1,2})?$/'],
            'interest' => ['required', 'regex:/^\d+(\.\d{1,2})?$/'],
            'origination' => ['required', 'regex:/^\d+(\.\d{1,2})?$/'],
            'cname' => ['nullable', 'string', 'max:255'],
            'ccompany' => ['nullable', 'string', 'max:255'],
            'ccontact' => ['nullable', 'string', 'max:255'],
            'remark' => ['nullable', 'string'],
            'score' => ['required', 'string'],
        ]);
        $application->update([
            'score' => $request->score,
            'loan_amt' => $request->loanamt,
            'loan_tenure' => $request->loant,
            'interest' => $request->interest,
            'origination_fee' => $request->origination,
            'consultant_company' => $request->ccompany,
            'consultant_contact' => $request->ccontact,
            'consultant_name' => $request->cname,
            'remark' => isset($request->remark) ? $request->remark : ''
        ]);
        $audit_controller = new AuditController;
        $audit_controller->create('Update Application', "Updated Application #" .$application->application_id . " by " . Auth::user()->name);
        return redirect()->route('showCompany', $application->company)->with('toast-success', 'Application Details Updated');
    }
    public function abort(Application $application)
    {
        $this->authorize('manager-priv');
        $application->update([
            'score' => 'aborted',
            'status' => 'aborted',
        ]);
        $audit_controller = new AuditController;
        $audit_controller->create('Abort Application', "Aborted Application #" .$application->application_id . " by " . Auth::user()->name);
        return redirect()->back()->with('toast-success', 'Application Aborted');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function destroy(Application $application)
    {
        $this->authorize('manager-rm');
        if ($application->user_id !== Auth::user()->id) {
            abort(403);
        }
        $application->delete();
        $audit_controller = new AuditController;
        $audit_controller->create('Delete Application', "Deleted Application #" .$application->application_id . " by " . Auth::user()->name);
        return redirect()->back()->with('toast-success', 'Application ');
    }

    public function submitReview(Application $application)
    {
        $this->authorize('manager-rm');
        if ($application->user_id !== Auth::user()->id) {
            abort(403);
        }
        $application->update([
            'status' => 'reviewing',
        ]);
        $audit_controller = new AuditController;
        $audit_controller->create('Review Application', "Submitted Application #" .$application->application_id . "  for review by " . Auth::user()->name);
        return redirect()->back()->with('toast-success', 'Company Submitted for Review');
    }

    public function submitApproval(Application $application)
    {
        $this->authorize('manager-priv');
        if (count(Approver::all()) == 0) {
            return redirect()->back()->with('toast-error', 'No Active Approvers Currently, Try again later.');
        }
        $approvers = Approver::all();
        foreach ($approvers as $approver) {
            $approver->assignApplications($application);
            $pivot = Application_Approver::where([['approver_id', '=', $approver->id], ['application_id', '=', $application->id]]);
            if ($application->loan_amt > 40000) {
                $pivot->update([
                    'type' => 1
                ]);
            } else if ($application->loan_amt <= 40000) {
                $pivot->update([
                    'type' => 0
                ]);
            }
        }
        $application->update([
            'status' => 'pending',
        ]);
        $audit_controller = new AuditController;
        $audit_controller->create('Submit Application', "Submitted Application #" .$application->application_id . " for approval by " . Auth::user()->name);
        return redirect()->back()->with('toast-success', 'Company Submitted for Approval');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function filter($col, $filter)
    {
        if (Auth::user()->isManager() || Auth::user()->isAdmin()) {
            $applications = Application::where($col, '=', $filter)->get();
            return view('application.list', compact('applications'));
        } else if (Auth::user()->isApprover()) {
            abort(404);
        } else if (Auth::user()->isRm()) {
            $applications = Application::where('user_id', '=', Auth::user()->id)->where($col, '=', $filter)->get();
            return view('application.list', compact('applications'));
        } else {
            abort(401);
        }
    }

    /**
     * Get all records from applications table as json 
     */
    public function getLoanAmt() {
        $loanAmt = DB::table('applications')->select('loan_amt','interest_type','approved_at')->where('approved_at', '!=', null)->get();
        $loanAmt = json_decode($loanAmt, true);
        foreach ($loanAmt as $la) {
            $loanAmtArr[] = (object) [
                'loan_amt' => $la['loan_amt'],
                'interest_type' => $la['interest_type'],
                'approved_at' =>  Carbon::parse($la['approved_at'])->format('M'),
            ];
        }
        if (count($loanAmtArr) == 0) {
            $loanAmtArr = null;
        }
        
        return $loanAmtArr;
    }
}
