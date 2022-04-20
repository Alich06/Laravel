<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'name'  => 'Ali Masood',
            'email' => 'ali@gmail.com',
            'password' => Hash::make('12345678'),
            'phone_no' => '03414144925',
        ]);
    }
}
