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
            'first_name'  => 'Ali',
            'last_name'  => 'Masood',
            'father_name'  => 'Masood Ahmad',
            'email' => 'ali@gmail.com',
            'password' => Hash::make('12345678'),
            'phone_no' => '03414144925',
            'role_name' => 'Admin',
            'age' => '22',
            'gender' => 'Male',
            'picture' => '1012152.png',
        ]);
    }
}
