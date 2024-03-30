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

        \App\Models\User::factory(10)->create();

    }
}
