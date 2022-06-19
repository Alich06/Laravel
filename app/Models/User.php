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

    public function enrollment()
    {
        return $this->hasOne(Enrollment::class);
    }
    public function marks()
    {
        return $this->hasOne(Mark::class);
    }
    public function subjects()
    {
        return $this->belongsToMany(Subject::class,'time_tables','teacher_id');
    }

    public function attendances()
    {
        return $this->belongsToMany(TimeTable::class,'attendances');
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new \App\Notifications\MailResetPasswordNotification($token));
    }

}
