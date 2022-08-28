<?php

namespace App\Http\Controllers;

use App\Company;
use App\Industry;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
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
  public function index()
  {
    $companies = Company::all();
    return view('company.index', compact('companies'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $this->authorize('manager-rm');
    $industries = Industry::all();
    return view('company.create', compact('industries'));
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
    $request->validate([
      'name' => ['required', 'string', 'max:255'],
      'uen' => ['required', 'string', 'max:255', 'unique:companies,uen'],
      'address' => ['required', 'string'],
      'gst' => ['required', 'boolean'],
      'industry' => ['required']
    ]);

    $company = Company::create([
      'name' => $request->name,
      'uen' => $request->uen,
      'gst_registered' => $request->gst,
      'address' => $request->address,
      'industry_id' => $request->industry

    ]);
    $audit_controller = new AuditController;
    $audit_controller->create('Create Company',  "Created Company Profile: ". $company->name ." UEN#: " .$company->uen . " by " . Auth::user()->name);
    return redirect(route('viewCompany'))->with('toast-success', 'Created New Company Profile');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Company  $company
   * @return \Illuminate\Http\Response
   */
  public function show(Company $company)
  {
    if (Auth::user()->isManager() || Auth::user()->isAdmin()) {
      $applications = $company->applications->sortBy('status');
      $contacts = $company->contacts;
      return view('company.show', compact('company', 'applications', 'contacts'));
    } else if (Auth::user()->isApprover()) {
      return redirect()->route('allApplication');
    } else if (Auth::user()->isRm()) {
      $applications = $company->applications->where('user_id', '=', Auth::user()->id)->sortBy('status');
      $contacts = $company->contacts;
      return view('company.show', compact('company', 'applications', 'contacts'));
    }
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Company  $company
   * @return \Illuminate\Http\Response
   */
  public function edit(Company $company, Request $request)
  {
    $this->authorize('manager-rm');
    $industries = DB::table('industries')->select(['id','name'])->where('id','<>',$company->industry_id)->get()->toArray();
    return view('company.edit', compact('company', 'industries'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Company  $company
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Company $company)
  {
    $this->authorize('manager-rm');
    if ($request->uen !== $company->uen) {
      $request->validate([
        'uen' => ['required', 'string', 'max:255', 'unique:companies,uen'],
      ]);
    }
    $request->validate([
      'name' => ['required', 'string', 'max:255'],
      'address' => ['required', 'string'],
      'gst' => ['required', 'boolean']
    ]);

      // dd($request);
    $orgCoyName = $company->name;  
    $orgCoyUEN = $company->uen;  
    $orgCoyAddr = $company->address;  
    $orgCoyInd = $company->industry_id;  
    $orgCoyGST = $company->gst_registered;

    $company->update([
      'name' => $request->name,
      'uen' => $request->uen,
      'address' => $request->address,
      'industry_id' => $request->industry,
      'gst_registered' => $request->gst,
    ]);
    $audit_controller = new AuditController;
    if ($request->name != $orgCoyName) {
      $audit_controller->create('Update Company',  "Company #" . $company->id . " (".$orgCoyName.")". " Company Name updated from " . "'".$orgCoyName."'" . " to " . "'".$request->name."'" . " by " . Auth::user()->name);
    }
    if ($request->uen != $orgCoyUEN) {
      $audit_controller->create('Update Company',  "Company #" . $company->id . " (".$orgCoyName.")". " Company UEN updated from " . "'".$orgCoyUEN."'" . " to " . "'".$request->uen."'" . " by " . Auth::user()->name);
    }
    if ($request->address != $orgCoyAddr) {
      $audit_controller->create('Update Company',  "Company #" . $company->id . " (".$orgCoyName.")". " Company Address updated from " . "'".$orgCoyAddr."'" . " to " . "'".$request->address."'" . " by " . Auth::user()->name);
    }
    if ($request->industry != $orgCoyInd) {
      $orgCoyInd = DB::table('industries')->select('name')->where('id', '=', $orgCoyInd)->get();
      $industry = DB::table('industries')->select('name')->where('id', '=', $request->industry)->get();
      $audit_controller->create('Update Company',  "Company #" . $company->id . " (".$orgCoyName.")". " Company Industry updated from " . "'".$orgCoyInd[0]->name."'" . " to " . "'".$industry[0]->name."'" . " by " . Auth::user()->name);
    }
    if ($request->gst != $orgCoyGST) {
      if($orgCoyGST == 1){
        $orgCoyGST = 'YES';
        $request->gst = 'NO';
        $audit_controller->create('Update Company',  "Company #" . $company->id . " (".$orgCoyName.")". " Company GST Registration updated from " . "'".$orgCoyGST."'" . " to " . "'".$request->gst."'" . " by " . Auth::user()->name);
      }
      elseif ($orgCoyGST == 0) {
        $orgCoyGST = 'NO';
        $request->gst = 'YES';
        $audit_controller->create('Update Company',  "Company #" . $company->id . " (".$orgCoyName.")". " Company GST Registration updated from " . "'".$orgCoyGST."'" . " to " . "'".$request->gst."'" . " by " . Auth::user()->name);
      }
    }
      
    return redirect(route('viewCompany'))->with('toast-success', 'Company Details Updated');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Company  $company
   * @return \Illuminate\Http\Response
   */
  public function destroy(Company $company)
  {
    //
  }
}
