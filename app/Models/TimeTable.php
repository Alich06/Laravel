<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeTable extends Model
{
    use HasFactory;

    protected $fillable =[
        'teacher_id',
        'subject_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'teacher_id')->where('role_name','teacher');
    }
    public function subject()
    {
        return $this->belongsTo(Subject::class,'subject_id');
    }
    public function enrollment()
    {
        return $this->hasOne(Enrollment::class);
    }
    public function attendance()
    {
        return $this->hasOne(Attendance::class);
    }
    public function mark()
    {
        return $this->hasOne(Mark::class);
    }
}
