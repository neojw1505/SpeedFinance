<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            
                'name' => 'admin',
                'email' => 'admin@test.com',
                'password' => Hash::make('testtest')
            
        ]);
        $user2 = User::create([
            
            'name' => 'rm',
            'email' => 'rm@test.com',
            'password' => Hash::make('testtest')
        
        ]);
        $user3 = User::create([
            
            'name' => 'manager',
            'email' => 'manager@test.com',
            'password' => Hash::make('testtest')
        
        ]);
        
        $user->assignRole('superAdmin');
        $user2->assignRole('rm');
        $user3->assignRole('manager');

    }
}
