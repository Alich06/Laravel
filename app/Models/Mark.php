<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    use HasFactory;
    protected $fillable =[
        'mid_marks', 'final_marks', 'total_marks','class_id','student_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class,'student_id');
    }
    public function subject()
    {
        return $this->belongsTo(TimeTable::class,'class_id');
    }
}
