<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teachers')->insert([
            'name'  => 'Ali ahmad',
            'email' => 'aliahamad@gmail.com',
            'password' => Hash::make('12345678'),
            'phone_no' => '12345678910',
        ]);
    }

}
