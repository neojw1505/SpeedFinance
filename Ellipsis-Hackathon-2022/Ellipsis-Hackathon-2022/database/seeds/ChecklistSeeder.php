<?php

use Illuminate\Database\Seeder;

class ChecklistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('checklists')->insert([
            [
                'name' => 'Latest Biz ACRA',
                'category' => 'mandatory'
            ],
            [
                'name' => "Past 06 Month's Bank Statements",
                'category' => 'mandatory'
            ],
            [
                'name' => "Past 02 Year's NOA of all Directors/Shareholders",
                'category' => 'mandatory'
            ],
            [
                'name' => 'Latest CBS of all Directors/Shareholders',
                'category' => 'mandatory'
            ],
            [
                'name' => 'Photocopy of IC (Front & Back of all Directors/Shareholders)',
                'category' => 'mandatory'
            ],
            [
                'name' => 'Photo of the Store/Office Space',
                'category' => 'optional'
            ],
            [
                'name' => "Past 03 Year's Financial Statements(Balance Sheet/P&L)",
                'category' => 'above 40k'
            ],
            [
                'name' => "Latest Up to Date Management Accounts",
                'category' => 'above 40k'
            ],
            [
                'name' => "Latest 3 Month's CPF Contribution",
                'category' => 'above 40k'
            ],
            [
                'name' => "Total Bank/Non-Bank Borrowing Details",
                'category' => 'above 40k'
            ],
            [
                'name' => "Tenancy Agreement",
                'category' => 'optional'
            ],
            [
                'name' => "Project Reference List/Progress Status",
                'category' => 'optional'
            ],
            [
                'name' => "Contract Agreement",
                'category' => 'optional'
            ],
            [
                'name' => "Latest 2 Quarter GST Return",
                'category' => 'gst'
            ],
            [
                'name' => "Latest Debtors' Aging List",
                'category' => 'optional'
            ],
            
        
        ]);
    }
}
