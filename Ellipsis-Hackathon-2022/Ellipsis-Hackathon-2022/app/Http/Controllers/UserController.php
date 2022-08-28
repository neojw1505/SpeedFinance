<?php

namespace App\Http\Controllers;

use App\Application;
use App\Approver;
use App\User;
use App\AuditLog;
use App\Reminder;
use App\Role;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{

  //this is redirect if admin is not logged in
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
   * Display Admins dashboard.
   *
   * @return \Illuminate\Http\Response
   */
  public function dashboard()
  {
    if (Auth::user()->isRm()) {
      $reminders = Reminder::where('updated_by', '=', Auth::user()->id)
        ->whereDate('dateTime', '>=', date('Y-m-d'))->paginate(10)->sortBy('dateTime');

      $hot = count(Application::where('user_id', '=', Auth::user()->id)->where('score', '=', 'hot')->get());
      $warm = count(Application::where('user_id', '=', Auth::user()->id)->where('score', '=', 'warm')->get());
      $cold = count(Application::where('user_id', '=', Auth::user()->id)->where('score', '=', 'cold')->get());
      $aborted = count(Application::where('user_id', '=', Auth::user()->id)->where('score', '=', 'aborted')->get());
      $rejected = count(Application::where('user_id', '=', Auth::user()->id)->where('score', '=', 'rejected')->get());


      $new = count(Application::where('user_id', '=', Auth::user()->id)->where('status', '=', 'new')->get());
      $pending = count(Application::where('user_id', '=', Auth::user()->id)->where('status', '=', 'pending')->get());
      $approved = count(Application::where('user_id', '=', Auth::user()->id)->where('status', '=', 'approved')->get());
      $rejected = count(Application::where('user_id', '=', Auth::user()->id)->where('status', '=', 'rejected')->get());
      $reviewing = count(Application::where('user_id', '=', Auth::user()->id)->where('status', '=', 'reviewing')->get());
      $aborted = count(Application::where('user_id', '=', Auth::user()->id)->where('status', '=', 'aborted')->get());
      $prevYear = Application::selectRaw('SUM(loan_amt) as totalAmt, MONTH(approved_at) as loanMonth')
        ->where('user_id', '=', Auth::user()->id)
        ->where('status', '=', 'approved')
        ->whereYear('approved_at', '=', date('Y', strtotime('-1 year')))
        ->whereDate('approved_at', '>', date('Y-m-d', strtotime('-12 month')))
        ->groupBy('loanMonth')
        ->get();

      foreach ($prevYear as $prev) {
        $prev->year = date('Y', strtotime('-1 year'));
      }

      $thisYear = Application::selectRaw('SUM(loan_amt) as totalAmt, MONTH(approved_at) as loanMonth')
        ->where('user_id', '=', Auth::user()->id)
        ->where('status', '=', 'approved')
        ->whereYear('approved_at', date('Y'))
        ->groupBy('loanMonth')
        ->get();

      foreach ($thisYear as $current) {
        $current->year = date('Y');
      }

      $merged = $prevYear->concat($thisYear)->toArray();
      $monthsArr = [];
      $amountArr = [];
      $counter = 0;
      foreach ($merged as $merge) {
        $amountArr[$counter] = $merge['totalAmt'] / 1000;
        $counter = $counter + 1;
      }
      $counter = 0;
      foreach ($merged as $merge) {
        $monthsArr[$counter] = date("M", mktime(0, 0, 0, $merge['loanMonth'], 10)) . ' ' . $merge['year'];
        $counter = $counter + 1;
      }

      return view('dashboard.rm', compact('reminders', 'hot', 'warm', 'cold', 'aborted', 'new', 'pending', 'approved', 'rejected', 'reviewing', 'monthsArr', 'amountArr'));
    } else if (Auth::user()->isAdmin() || Auth::user()->isManager()) {
      $reminders = Reminder::where('updated_by', '=', Auth::user()->id)
        ->whereDate('dateTime', '>=', date('Y-m-d'))->paginate(10)->sortBy('dateTime');
      $hot = count(Application::where('score', '=', 'hot')->get());
      $warm = count(Application::where('score', '=', 'warm')->get());
      $cold = count(Application::where('score', '=', 'cold')->get());
      $aborted = count(Application::where('score', '=', 'aborted')->get());
      $rejected = count(Application::where('score', '=', 'rejected')->get());


      $new = count(Application::where('status', '=', 'new')->get());
      $pending = count(Application::where('status', '=', 'pending')->get());
      $approved = count(Application::where('status', '=', 'approved')->get());
      $rejected = count(Application::where('status', '=', 'rejected')->get());
      $reviewing = count(Application::where('status', '=', 'reviewing')->get());
      $aborted = count(Application::where('status', '=', 'aborted')->get());
      $prevYear = Application::selectRaw('SUM(loan_amt) as totalAmt, MONTH(approved_at) as loanMonth')
        ->where('status', '=', 'approved')
        ->whereYear('approved_at', '=', date('Y', strtotime('-1 year')))
        ->whereDate('approved_at', '>', date('Y-m-d', strtotime('-12 month')))
        ->groupBy('loanMonth')
        ->get();

      foreach ($prevYear as $prev) {
        $prev->year = date('Y', strtotime('-1 year'));
      }

      $thisYear = Application::selectRaw('SUM(loan_amt) as totalAmt, MONTH(approved_at) as loanMonth')
        ->where('status', '=', 'approved')
        ->whereYear('approved_at', date('Y'))
        ->groupBy('loanMonth')
        ->get();

      foreach ($thisYear as $current) {
        $current->year = date('Y');
      }

      $merged = $prevYear->concat($thisYear)->toArray();
      $monthsArr = [];
      $amountArr = [];
      $counter = 0;
      foreach ($merged as $merge) {
        $amountArr[$counter] = $merge['totalAmt'] / 1000;
        $counter = $counter + 1;
      }
      $counter = 0;
      foreach ($merged as $merge) {
        $monthsArr[$counter] = date("M", mktime(0, 0, 0, $merge['loanMonth'], 10)) . ' ' . $merge['year'];
        $counter = $counter + 1;
      }

      $kpi_data = Application::where('status', '=', 'approved')->select('loan_amt', 'approved_at')->get();

      return view('dashboard.admin', compact('reminders', 'hot', 'warm', 'cold', 'aborted', 'new', 'kpi_data', 'pending', 'approved', 'rejected', 'reviewing', 'monthsArr', 'amountArr'));
    } else {
      return redirect()->route('home');
    }
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $this->authorize('admin-manager');
    if (Auth::user()->isAdmin()) {
      $users = User::whereHas(
        'roles',
        function ($q) {
          $q->where('name', '!=', 'approver')
            ->where('name', '!=', 'superAdmin');
        }
      )->get();
    } else {
      $users = User::whereHas(
        'roles',
        function ($q) {
          $q->where('name', '=', 'rm');
        }
      )->get();
    }
    $approvers = User::whereHas('approver')->get();
    $notActives = User::whereHas('roles', function (Builder $query) {
      $query->where('name', '=', 'approver');
    })->whereDoesntHave('approver')->get();

    return view('user.index', compact('users', 'notActives', 'approvers'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $this->authorize('create-acc');

    return view('user.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $this->authorize('create-acc');
    if (!Auth::user()->isAdmin() && 'approver' !== $request->role && 'rm' !== $request->role) {
      abort(404);
    }
    $request->validate([
      'name' => ['required', 'string', 'max:255'],
      'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
      'password' => ['required', 'string', 'min:8', 'confirmed'],
    ]);

    $user = User::create([
      'name' => $request->name,
      'email' => $request->email,
      'password' => Hash::make($request->password)

    ]);
    $user->assignRole($request->role);
    if ($request->role == 'approver') {
      Approver::create([
        'user_id' => $user->id
      ]);
    }
    $audit_controller = new AuditController;
    $audit_controller->create('Create User',  "Created User Profile: ". $user->name ." Role: " .$request->role . " by " . Auth::user()->name);

    return redirect(route('viewUser'))->with('toast-success', 'User Created');
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\User  $user
   * @return \Illuminate\Http\Response
   */
  public function edit(User $user)
  {
    $this->authorize('admin-manager');
    return view('user.edit', compact('user'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\User  $user
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, User $user)
  {
    $this->authorize('admin-manager');

    $orgUserName = $user->name;
    $orgUserEmail = $user->email;
    $orgUserPwd = $user->password;

    if (Auth::user()->isAdmin()) {
      if ($user->email !== $request->email) {
        $request->validate(['email' => ['required', 'string', 'email', 'max:255', 'unique:users'],]);
      }

      if (empty($request->password)) {
        $request->validate([
          'name' => ['required', 'string', 'max:255'],
        ]);

        $user->update([
          'name' => $request->name,
          'email' => $request->email,
        ]);
      } else {
        $request->validate([
          'name' => ['required', 'string', 'max:255'],
          'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user->update([
          'name' => $request->name,
          'email' => $request->email,
          'password' => Hash::make($request->password)

        ]);
      }
    } else {
      if ($user->email !== $request->email) {
        $request->validate(['email' => ['required', 'string', 'email', 'max:255', 'unique:users'],]);
      }
      $request->validate([
        'name' => ['required', 'string', 'max:255'],
      ]);
      $user->update([
        'name' => $request->name,
        'email' => $request->email,
      ]);
    }
    
    $audit_controller = new AuditController;
    if ($request->name != $orgUserName){
      $audit_controller->create('Update User', "Updated User #". $user->id ." Name: "."'".$orgUserName."'" ." -> ". "'".$request->name."'"." by ". Auth::user()->name);  
    }
    if ($request->email != $orgUserEmail){
      $audit_controller->create('Update User', "Updated User #". $user->id ." Email: "."'".$orgUserEmail."'" ." -> ". "'".$request->email."'"." by ". Auth::user()->name);  
    }  
    if(!Hash::check($request->password, $orgUserPwd) && $request->password != ""){
      $audit_controller->create('Update User', "Updated User #". $user->id ." Password by ". Auth::user()->name);  
    }  

    return redirect(route('viewUser'))->with('toast-success', 'User Updated');
  }


  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\User  $user
   * @return \Illuminate\Http\Response
   */
  public function ban(User $user)
  {
    $this->authorize('admin-manager');
    return view('user.ban', compact('user'));
  }


  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\User  $user
   * @return \Illuminate\Http\Response
   */
  public function changeBan(Request $request, User $user)
  {
    $this->authorize('admin-manager');

    if ($user->banned == 0) {
      $user->update([
        'banned' => 1
      ]);
      $audit_controller = new AuditController;
      $audit_controller->create('Disable User', "Disabled User #". $user->id ." Email: "."'".$user->email."'"." by ". Auth::user()->name);  
    } else {
      $user->update([
        'banned' => 0
      ]);
      $audit_controller = new AuditController;
      $audit_controller->create('Enable User', "Enabled User #". $user->id ." Email: "."'".$user->email."'"." by ". Auth::user()->name);  
    }
    return redirect(route('viewUser'))->with('toast-success', 'Ban Status Updated');
  }
}
