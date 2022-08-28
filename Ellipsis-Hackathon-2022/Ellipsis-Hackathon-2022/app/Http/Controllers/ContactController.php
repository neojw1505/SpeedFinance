<?php

namespace App\Http\Controllers;

use App\Company;
use App\Contact;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
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
    public function create(Company $company)
    {
        $this->authorize('manager-rm');
        return view('contact.create', compact('company'));
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
            'name' => ['required', 'string', 'max:50'],
            'mobile' => ['required', 'string', 'numeric'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'title' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string', 'max:255']
        ]);
        if (count($company->contacts) > 0) {
            $type = $request->type;
        } else {
            $type = 'Primary';
        }
        if ($type == 'Primary') {
            $contacts = $company->contacts->where('type', '=', 'Primary');
            foreach ($contacts as $contact) {
                $contact->update([
                    'type' => 'Secondary'
                ]);
            }
        }

        Contact::create([
            'company_id' => $company->id,
            'name' => $request->name,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'title' => $request->title,
            'type' => $type
        ]);
        $audit_controller = new AuditController;
        $audit_controller->create('Create Contact',  "Created Contact: "."'".$request->name."'". " for Company #UEN: ". $company->uen ." (".$company->name.") by " . Auth::user()->name);    
        return redirect(route('showCompany', $company))->with('toast-success', 'New Contact Created');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        $this->authorize('manager-rm');
        return view('contact.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        $this->authorize('manager-rm');
        $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'mobile' => ['required', 'string', 'numeric'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'title' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string', 'max:255']
        ]);
        if ($contact->type == 'Primary') {
            $type = 'Primary';
        } else if ($request->type == 'Primary') {
            $conts = $contact->company->contacts->where('type', '=', 'Primary');
            foreach ($conts as $cont) {
                $cont->update([
                    'type' => 'Secondary'
                ]);
            }
            $type = $request->type;
        } else {
            $type = $request->type;
        }

        $orgCtcName = $contact->name;  
        $orgCtcMobile = $contact->mobile;  
        $orgCtcEmail = $contact->email;  
        $orgCtcTitle = $contact->title;  
        $orgCtcType = $contact->type;

        $orgCoyName = $contact->company->name;

        $contact->update([
            'name' => $request->name,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'title' => $request->title,
            'type' => $type

        ]);
        $audit_controller = new AuditController;
        if ($request->name != $orgCtcName) {
            $audit_controller->create('Update Contact',  "Company #" . $contact->company_id . " (".$orgCoyName.")". " Contact Name updated from " . "'".$orgCtcName."'" . " to " . "'".$request->name."'" . " by " . Auth::user()->name);
        }
        if ($request->mobile != $orgCtcMobile) {
            $audit_controller->create('Update Contact',  "Company #" . $contact->company_id . " (".$orgCoyName.")". " Contact Mobile updated from " . "'".$orgCtcMobile."'" . " to " . "'".$request->mobile."'" . " by " . Auth::user()->name);
        }
        if ($request->email != $orgCtcEmail) {
            $audit_controller->create('Update Contact',  "Company #" . $contact->company_id . " (".$orgCoyName.")". " Contact Email updated from " . "'".$orgCtcEmail."'" . " to " . "'".$request->email."'" . " by " . Auth::user()->name);
        }
        if ($request->title != $orgCtcTitle) {
            $audit_controller->create('Update Contact',  "Company #" . $contact->company_id . " (".$orgCoyName.")". " Contact Title updated from " . "'".$orgCtcTitle."'" . " to " . "'".$request->title."'" . " by " . Auth::user()->name);
        }
        if ($request->type != $orgCtcType) {
            $audit_controller->create('Update Contact',  "Company #" . $contact->company_id . " (".$orgCoyName.")". " Contact Type updated from " . "'".$orgCtcType."'" . " to " . "'".$request->type."'" . " by " . Auth::user()->name);
        }
        return redirect()->route('showCompany', $contact->company)->with('toast-success', 'Contact Details Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        $this->authorize('manager-rm');
        $company = $contact->company;
        $contact->delete();

        $orgCoyName = $contact->company->name;

        $audit_controller = new AuditController;
        
        $audit_controller->create('Delete Contact',  "Deleted Contact: "."'".$contact->name."'". " for Company #UEN: ". $company->uen ." (".$company->name.") by " . Auth::user()->name);    
        return redirect()->route('showCompany', $company)->with('toast-success', 'Contact Deleted');
    }
}
