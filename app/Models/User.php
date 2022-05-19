<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        'first_name',
        'last_name',
        'role_name',
        'father_name',
        'email',
        'password',
        'picture',
        'phone_no',
        'age',
        'gender',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
}
