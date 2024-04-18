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
                'email' => 'admin@gmail.com',
                'role' => 'admin',
                'phone_no' => '000000000',
                'username' => 'administrator@p48inv.com',
                'password' => Hash::make('admin'),
            ],
            // [
            //     'name' => 'Test User',
            //     'email' => 'test@gmail.com',
            //     'phone_no' => '09051787849',
            //     'role' => 'user',
            //     'username' => 'test01',
            //     'password' => Hash::make('testing01'),
            // ],
        ]);


        // $users = \App\Models\User::factory(11)->create();

        // $referringUser = \App\Models\User::where('username', 'test01')->first();

        // foreach ($users as $user) {
        //     \App\Models\Referral::create([
        //         'user_id' => $user->id,
        //         'referred_by' => 'test01',
        //         'referring_user_id' => $referringUser->id,
        //     ]);
        // }
    }
}
