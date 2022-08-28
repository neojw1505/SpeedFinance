<?php

namespace App\Http\Controllers;

use App\Application;
use Illuminate\Http\Request;
use App\Http\Traits\CreditMemoTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class CreditMemoController extends Controller
{
    use CreditMemoTrait;
    
    public function index(Application $application)
    {
        $this->authorize('manager-priv');
        
        if (isset($application->memo)) {
            $html = htmlspecialchars_decode($application->memo);
        } else {
            $html = $this->populateTemplate($application);
        }
        
        return view('creditMemo.edit', compact('application', 'html'));
    }

    public function reset(Application $application)
    {
        $this->authorize('manager-priv');
        
        $html = $this->populateTemplate($application);
        
        $audit_controller = new AuditController;
        $audit_controller->create('Reset Credit Memo',  "Application #" . $application->application_id . " credit memo resetted by ". Auth::user()->name);
        return response()->json(['data' => $html], 200);
    }

    public function store(Request $request, Application $application)
    {
        $this->authorize('manager-priv');

        $html = $request->memo;
        
        $application->update([
            'memo' => htmlspecialchars($html)
        ]);
        $audit_controller = new AuditController;
        $audit_controller->create('Save Credit Memo',  "Application #" . $application->application_id . " credit memo saved by ". Auth::user()->name);
        return response()->json(['data' => 'Credit memo is successfully saved.']);
    }

    public function export(Request $request, Application $application)
    {
        $this->authorize('manager-priv');
        
        $fileName = 'credit_memo.pdf';
        $html = $request->memo;

        $header = view('creditMemo.partials.templateHeader')->render();

        $pdf = \PDF::loadHTML($html)
                ->setOption('margin-top', '30mm')
                ->setOption('header-html', $header)
                ->output();
                
        $headers = [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . $fileName . '"',
        ];
        
        $audit_controller = new AuditController;
        $audit_controller->create('Export Credit Memo',  "Application #" . $application->application_id . " credit memo exported by ". Auth::user()->name);
        return \Response::make($pdf, 200, $headers);
    }
}