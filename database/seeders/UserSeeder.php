<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name'  => 'Hamza',
            'last_name'  => 'khan',
            'father_name'  => 'Khan Ahmad',
            'email' => 'hamza@gmail.com',
            'password' => Hash::make('12345678'),
            'phone_no' => '1234567897',
            'role_name' => 'admin',
            'age' => '19',
            'gender' => 'Male',
            'picture' => '1012152.png',
        ]);
    }
}
