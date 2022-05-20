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
            'first_name'  => 'Nasir',
            'last_name'  => 'Hussain',
            'father_name'  => 'Hussain Ahmad',
            'email' => 'nasir@gmail.com',
            'password' => Hash::make('12345678'),
            'phone_no' => '03414144925',
            'role_name' => 'Teacher',
            'age' => '22',
            'gender' => 'Male',
            'picture' => '1012152.png',
        ]);
    }
}
