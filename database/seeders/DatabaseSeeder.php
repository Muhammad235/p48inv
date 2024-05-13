<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        \App\Models\User::insert([
            [
                'name' => 'Admin',
                'email' => 'administrator@p48inv.com',
                'role' => 'admin',
                'phone_no' => '000000000',
                'username' => 'administrator',
                'password' => Hash::make('admin'),
            ],
            // [
            //     'name' => 'Test User',
            //     'email' => 'test@gmail.com',
            //     'phone_no' => '09051787849',
            //     'role' => 'user',
            //     'date_of_birth' => '2000-11-05',
            //     'username' => 'test01',
            // ],
        ]);

    }
}
