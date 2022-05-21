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

    public function teacher()
    {
        return $this->hasOne(TimeTable::class);
    }
    public function student()
    {
        return $this->hasOne(Attendance::class);
    }
    public function enrollment()
    {
        return $this->hasOne(Enrollment::class);
    }
    public function marks()
    {
        return $this->hasOne(Mark::class);
    }
}
