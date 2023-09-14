<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Company;
use App\Models\Employeer;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        $companies = Company::factory(10)->create();
        $employees = Employeer::factory(20)->create();
        if (!User::first()) {
            \App\Models\User::factory()->create([
                'name' => env('INITIAL_USER_NAME'),
                'email' => env('INITIAL_USER_EMAIL'),
                'password' => env('INITIAL_USER_PASSWORDHASH'),
            ]);
        }

        
    }
}
