<?php

namespace App\Http\Controllers;

use App\Application;
use App\Reminder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ReminderController extends Controller
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
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create(Application $application)
  {
    $this->authorize('manager-rm');
    if ($application->user_id !== Auth::user()->id && Auth::user()->id !== 3) {
      abort(403);
    }
    return view('reminder.create', compact('application'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Application $application, Request $request)
  {
    $this->authorize('manager-rm');
    if ($application->user_id !== Auth::user()->id && Auth::user()->id !== 3) {
      abort(403);
    }
    $request->validate([
      'title' => ['required', 'string'],
      'detail' => ['required', 'string'],
      'date' => ['required', 'date'],
      'time' => ['required', 'date_format:H:i'],
    ]);

    $dateTime = $request->date . $request->time;
    $remindBef = $request->notif;
    $remindAt = Carbon::parse($dateTime)->subMinute($remindBef);
    $user = Auth::user()->id;
    Reminder::create([
      'application_id' => $application->id,
      'dateTime' => $dateTime,
      'title' => $request->title,
      'detail' => $request->detail,
      'created_by' => $user,
      'updated_by' => $user,
      'remindBef' => $request->notif,
      'remindAt' => $remindAt
    ]);
    
    $audit_controller = new AuditController;
    $audit_controller->create('Create Reminder', "Created Reminder: ". "'".$request->title."' for Application #".$application->application_id." by ". Auth::user()->name);
    return redirect(route('showApplication', $application))->with('toast-success', 'Reminder Created');
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Reminder  $reminder
   * @return \Illuminate\Http\Response
   */
  public function edit(Reminder $reminder)
  {
    $this->authorize('manager-rm');
    // if not the user who created and also not a manager -> abort 403
    if ($reminder->application->user_id !== Auth::user()->id && Auth::user()->id !== 3) {
      abort(403);
    }
    return view('reminder.edit', compact('reminder'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Reminder  $reminder
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Reminder $reminder)
  {
    $this->authorize('manager-rm');
    // if not the user who created and also not a manager -> abort 403
    if ($reminder->application->user_id !== Auth::user()->id && Auth::user()->id !== 3) {
      abort(403);
    }
    $request->validate([
      'title' => ['required', 'string'],
      'detail' => ['required', 'string'],
      'date' => ['required', 'date'],
      'time' => ['required', 'date_format:H:i'],
    ]);

    $orgRmdTitle = $reminder->title;
    $orgRmdDetail = $reminder->detail;
    $orgRmdDate = Carbon::createFromFormat('Y-m-d H:i:s',$reminder->dateTime)->format('Y-m-d');
    $orgRmdTime = Carbon::createFromFormat('Y-m-d H:i:s',$reminder->dateTime)->format('H:i');
    $dateTime = $request->date . $request->time;

    $user = Auth::user()->id;
    $reminder->update([
      'title' => $request->title,
      'detail' => $request->detail,
      'dateTime' => $dateTime,
      'updated_by' => $user
    ]);

    $audit_controller = new AuditController;
    if ($request->title != $orgRmdTitle){
      $audit_controller->create('Update Reminder', "Updated Reminder (".$reminder->title.") Title: "."'".$orgRmdTitle."'" ." -> ". "'".$request->title."'"." for Application #".$reminder->application->application_id." by ". Auth::user()->name);  
    } 
    if ($request->detail != $orgRmdDetail){
      $audit_controller->create('Update Reminder', "Updated Reminder (".$reminder->title.") Details: "."'".$orgRmdDetail."'" ." -> ". "'".$request->detail."'"." for Application #".$reminder->application->application_id." by ". Auth::user()->name);  
    } 
    if ($request->date != $orgRmdDate){
      $audit_controller->create('Update Reminder', "Updated Reminder (".$reminder->title.") Date: "."'".$orgRmdDate."'" ." -> ". "'".$request->date."'"." for Application #".$reminder->application->application_id." by ". Auth::user()->name);  
    } 
    if ($request->time != $orgRmdTime){
      $audit_controller->create('Update Reminder', "Updated Reminder (".$reminder->title.") Time: "."'".$orgRmdTime."'" ." -> ". "'".$request->time."'"." for Application #".$reminder->application->application_id." by ". Auth::user()->name);  
    } 

    return redirect()->route('showApplication', $reminder->application)->with('toast-success', 'Reminder Updated');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Reminder  $reminder
   * @return \Illuminate\Http\Response
   */
  public function destroy(Reminder $reminder)
  {
    $this->authorize('manager-rm');
    if ($reminder->application->user_id !== Auth::user()->id && Auth::user()->id !== 3) {
      abort(403);
    }
    $application = $reminder->application;
    $reminder->delete();
    $audit_controller = new AuditController;
    $audit_controller->create('Delete Reminder', "Deleted Reminder: ". "'".$reminder->title."' for Application #".$application->application_id." by ". Auth::user()->name);
    return redirect()->route('showApplication', $application)->with('toast-success', 'Reminder Deleted');
  }
}
