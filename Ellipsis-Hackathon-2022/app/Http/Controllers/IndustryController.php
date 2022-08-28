<?php

namespace App\Http\Controllers;

use App\Industry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndustryController extends Controller
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
     * Show the form for creating the specified resource.
     *
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('admin-manager');
        return view('industry.create');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('admin-manager');
        $industries = Industry::all();
        return view('industry.index', compact('industries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('admin-manager');
        $request->validate([
          'name' => ['required', 'string', 'max:255', 'unique:industries']
        ]);
  
        Industry::create([
          'name' => $request->name
        ]);
        
        $audit_controller = new AuditController;
        $audit_controller->create('Create Industry', "Created Industry: ". "'".$request->name."' by ". Auth::user()->name);
        return redirect()->route('viewIndustry')->with('toast-success', 'Industry Created');
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function destroy(Industry $industry)
    {
        $this->authorize('admin-manager');
        if(in_array($industry->name, array('Construction' , 'Food & Beverages' , 'Retail'))){
            return redirect()->back()->with('toast-error', 'Unable to remove due to checklist conditions being tied to this Industry');
        }else if($industry->companies()->exists()){
            return redirect()->back()->with('toast-error', 'Unable to remove as there are existing companies tied to this Industry');
        }else{
            $industry->delete();
            $audit_controller = new AuditController;
            $audit_controller->create('Delete Industry', "Deleted Industry: ". "'".$industry->name."' by ". Auth::user()->name);
            return redirect()->route('viewIndustry')->with('toast-success', 'Industry Deleted');
        }
        
        
    }

}
