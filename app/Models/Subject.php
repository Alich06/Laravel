<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $fillable =[
        'subject_name','department_id'
    ];

    public function department()
    {
        return $this->belongsTo(Department::class,'department_id','id');
    }
    
    public function teachers()
    {
        return $this->belongsToMany(User::class)->where('role_name','teacher');
    }
}
