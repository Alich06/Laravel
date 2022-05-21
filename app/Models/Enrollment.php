<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;
    protected $fillable=[
        'class_id',
        'student_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class,'student_id')->where('role_name','student');
    }
    public function subject()
    {
        return $this->belongsTo(TimeTable::class,'class_id');
    }
}
