<?php

use App\Industry;
use Illuminate\Database\Seeder;

class IndustrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('industries')->insert([
            [
                'name' => 'Retail'
            ],
            [
                'name' => 'Food & Beverages'
            ],
            [
                'name' => 'Construction'
            ]
        
        ]);
    }
}
