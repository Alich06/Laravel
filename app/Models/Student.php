<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable= [
        'name',
        'email',
        'password',
        'phone_no',
        'registration_no',
        'address'
    ];
    protected $hidden = [
        'password',
    ];
}
