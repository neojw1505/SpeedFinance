<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Rules\MatchOldPassword;
use Illuminate\Auth\Middleware\Authorize;

class ChangePassController extends Controller
{

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
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('user.change');
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
      $request->validate([
        'oldPassword' => ['required', new MatchOldPassword],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
      ]);

        Auth::user()->password = Hash::make($request->password);
        Auth::user()->save();
        
        if(Auth::user()->isAdmin() || Auth::user()->isManager() || Auth::user()->isRm()){
            $audit_controller = new AuditController;
            $audit_controller->create('Change Password', Auth::user()->name . " Changed Password");
            return redirect('dashboard')->with('toast-success', 'Password Changed');
        }else{
            $audit_controller = new AuditController;
            $audit_controller->create('Change Password', Auth::user()->name . " changed password");
            return redirect(route('home'))->with('toast-success', 'Password Changed');
        }
    

    }

    
}
