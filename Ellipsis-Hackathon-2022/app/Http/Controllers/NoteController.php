<?php

namespace App\Http\Controllers;

use App\Application;
use App\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NoteController extends Controller
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
    return view('note.create', compact('application'));
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
      'detail' => ['required', 'string']
    ]);
    $user = Auth::user()->id;
    Note::create([
      'application_id' => $application->id,
      'detail' => $request->detail,
      'created_by' => $user,
      'updated_by' => $user,
    ]);
    
    $audit_controller = new AuditController;
    $audit_controller->create('Create Note', "Created Note: ". "'".$request->detail."' for Application #".$application->application_id." by ". Auth::user()->name);
    return redirect(route('showApplication', $application))->with('toast-success', 'Note Created');
  }


  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Note  $note
   * @return \Illuminate\Http\Response
   */
  public function edit(Note $note)
  {
    $this->authorize('manager-rm');
    if ($note->application->user_id !== Auth::user()->id && Auth::user()->id !== 3) {
      abort(403);
    }
    return view('note.edit', compact('note'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Note  $note
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Note $note)
  {
    $this->authorize('manager-rm');
    if ($note->application->user_id !== Auth::user()->id && Auth::user()->id !== 3) {
      abort(403);
    }
    $request->validate([
      'detail' => ['required', 'string']
    ]);
    $user = Auth::user()->id;
    $orgNote = $note->detail;
    $note->update([
      'detail' => $request->detail,
      'updated_by' => $user
    ]);
    $audit_controller = new AuditController;
    $application = DB::table('applications')->select('application_id')->where('id','=',$note->application_id)->get();
    $audit_controller->create('Update Note', "Updated Note Details: ". "'".$orgNote."'" ." -> ". "'".$request->detail."' for Application #".$application[0]->application_id." by ". Auth::user()->name);
    return redirect()->route('showApplication', Application::find($note->application_id))->with('toast-success', 'Note Details Updated');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Note  $note
   * @return \Illuminate\Http\Response
   */
  public function destroy(Note $note)
  {
    $this->authorize('manager-rm');
    if ($note->application->user_id !== Auth::user()->id && Auth::user()->id !== 3) {
      abort(403);
    }
    $application = Application::find($note->application_id);
    $note->delete();
    $audit_controller = new AuditController;
    $audit_controller->create('Delete Note', "Deleted Note: ". "'".$note->detail."' for Application #".$application->application_id." by ". Auth::user()->name);
    return redirect()->route('showApplication', $application)->with('toast-success', 'Note Deleted');
  }
}
