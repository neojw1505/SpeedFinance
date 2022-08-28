<?php

namespace App\Http\Controllers;

use App\Application;
use App\Application_Approver;
use App\Approver;
use App\Role;
use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApproverController extends Controller
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

    private function appApproved(Application $application)
    {
        $application->update([
            'status' => 'approved',
            'approved_at' => date('Y-m-d H:i:s')
        ]);
    }

    private function appRejected(Application $application)
    {
        $application->update([
            'status' => 'rejected',
            'score' => 'rejected'
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('manager-priv');
        $approvers = User::whereHas('approver')->get();
        $notActive = User::whereHas('roles', function (Builder $query) {
            $query->where('name', '=', 'approver');
        })->whereDoesntHave('approver')->get();


        return view('approver.index', compact('approvers', 'notActive'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        $this->authorize('admin-manager');
        $approver = Approver::withTrashed()
            ->where('user_id', $user->id)
            ->first();
        $approver->restore();
        $audit_controller = new AuditController;
        $audit_controller->create('Activate Approver', "Activated Approver #" . $approver->id . " by " . Auth::user()->name);
        return redirect()->route('viewUser')->with('toast-success', 'Successfully Activated Approver');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $this->authorize('admin-manager');
        $approver = $user->approver;
        if (count($approver->applications->where('status', '=', 'pending')) > 0) {
            return redirect()->back()->with('toast-error', 'Unable to remove as ' . $approver->user->name . ' still has/have ' . count($approver->applications->where('status', '=', 'pending')) . ' outstanding applications');
        } else {
            $approver->delete();
            $audit_controller = new AuditController;
            $audit_controller->create('Deactivate Approver', "Deactivated Approver #" . $approver->id . " by " . Auth::user()->name);
            return redirect()->route('viewUser')->with('toast-success', 'Successfully Deactivated');
        }
    }

    public function approve(Application $application)
    {
        $this->authorize('active-approvers');
        $pivot = Application_Approver::where([['application_id', '=', $application->id], ['approver_id', '=', Auth::user()->approver->id]])->firstOrFail();
        if (!isset($pivot)) {
            abort(401);
        } else if ($pivot->type == 0) {
            if ($pivot->status !== 'pending') {
                return redirect()->back()->with('toast-error', 'Application has already been processed by another approver.');
            } else {
                $this->appApproved($application);
                $pivots = Application_Approver::where([['application_id', '=', $application->id], ['status', '=', 'pending']])->get();
                foreach ($pivots as $p) {
                    $p->update([
                        'status' => 'approved',
                        'approved_by' => Auth::user()->id
                    ]);
                }
            }
        } else if ($pivot->type == 1) {
            $pivot->update([
                'status' => 'approved'
            ]);
            $notApproved = count(Application_Approver::where([['application_id', '=', $application->id], ['status', '!=', 'approved']])->get());
            if ($notApproved == 0) {
                $this->appApproved($application);
                $pivots = Application_Approver::where('application_id', '=', $application->id)->get();
                foreach ($pivots as $p) {
                    $p->update([
                        'approved_by' => 'All'
                    ]);
                }
            } 
        }
        $audit_controller = new AuditController;
        $audit_controller->create('Approve Application', "Approved Application #" .$application->application_id . " by " . Auth::user()->name);
        return redirect()->back()->with('toast-success', 'Application Approved');
    }

    public function reject(Application $application)
    {
        $this->authorize('active-approvers');
        $pivots = Application_Approver::where([['application_id', '=', $application->id], ['status', '=', 'pending']])->get();

        $piv = Application_Approver::where([['application_id', '=', $application->id], ['approver_id', '=', Auth::user()->approver->id]])->firstOrFail();
        if ($piv->status != 'pending') {
            return redirect()->back()->with('toast-error', 'Application has already been processed by another approver.');
        }
        foreach ($pivots as $pivot) {
            $pivot->update([
                'status' => 'rejected',
                'rejected_by' => Auth::user()->id
            ]);
        }
        $audit_controller = new AuditController;
        $audit_controller->create('Reject Application', "Rejected Application #" .$application->application_id . " by " . Auth::user()->name);
        $this->appRejected($application);
        return redirect()->back()->with('toast-success', 'Application Rejected');
    }
}
