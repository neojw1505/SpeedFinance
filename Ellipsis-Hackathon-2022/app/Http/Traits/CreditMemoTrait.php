<?php

namespace App\Http\Traits;

use Carbon\Carbon;
use App\Application;

trait CreditMemoTrait
{
    public function populateTemplate(Application $application)
    {
        $contact = $application->company->contacts->where('type', '=', 'Primary')->first();
        
        // get last 6 months
        $firstMonth = strtotime('first day this month');
        $months = [];
        for ($i = 1; $i <= 6; $i++) {
            array_push($months, date('M Y', strtotime("-$i month", $firstMonth)));
        }

        // get last 3 years
        $firstYear = strtotime('first day this year');
        $years = [];
        for ($i = 1; $i <= 3; $i++) {
            $year = date('Y', strtotime("-$i year", $firstYear));
            array_push($years, "Jan $year &ndash; Dec $year");
        }

        $contents = [
            'date' => Carbon::today()->format(config('app.format_date_memo')),
            'companyName' => $application->company->name,
            'uen' => $application->company->uen,
            'address' => $application->company->address,
            'contactPerson' => isset($contact) ? $contact->name : null,
            'contactNumber' => isset($contact) ? $contact->mobile : null,
            'emailAddress' => isset($contact) ? $contact->email : null,
            'loanTenor' => $application->loan_tenure,
            'months' => $months,
            'years' => $years,
        ];

        $blade = $this->checkLoanAmt($application->loan_amt) ? 'creditMemo.partials.template40kAndBelow' : 'creditMemo.partials.template40kAbove';

        $html = view($blade, $contents)->render();

        return $html;
    }

    public function checkLoanAmt($loanAmt)
    {
        return $loanAmt < 40000;
    }
}