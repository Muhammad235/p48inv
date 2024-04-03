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

        // \App\Models\User::create([
        //     'name' => 'Muhammad Yahaya',
        //     'email' => 'adelekeyahaya05@gmail.com',
        //     'phone_no' => '09031389842',
        //     'password' => Hash::make('okikiola(m)'),
        //     'username' => 'adeleke01',
        // ]);

        \App\Models\User::insert([
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'role' => 'admin',
                'phone_no' => '000000000',
                'username' => 'admin',
                'password' => Hash::make('admin'),
            ],
            [
                'name' => 'Muhammad Yahaya',
                'email' => 'adelekeyahaya05@gmail.com',
                'phone_no' => '09031389842',
                'role' => 'user',
                'username' => 'adeleke01',
                'password' => Hash::make('okikiola(m)'),
            ],
        ]);


        // $users = \App\Models\User::factory(11)->create();

        // $referringUser = \App\Models\User::where('username', 'adeleke01')->first();

        // foreach ($users as $user) {
        //     \App\Models\Referral::create([
        //         'user_id' => $user->id,
        //         'referred_by' => 'adeleke01',
        //         'referring_user_id' => $referringUser->id,
        //     ]);
        // }


    }
}
