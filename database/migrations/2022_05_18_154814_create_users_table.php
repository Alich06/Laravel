<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('role_name');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('father_name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('picture');
            $table->string('phone_no');
            $table->enum('gender',['Male','Female']);
            $table->string('age');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.`
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
