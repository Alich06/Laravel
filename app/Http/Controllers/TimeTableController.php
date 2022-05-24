<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\User;
use Carbon\Traits\Date;

class TimeTableController extends Controller
{
    //timetable use as a class in which one teacher and subject will added together in a table.

    public function createClass(User $user, Subject $subject)
    {
        //return $user;
        //return $subject;

        $user->subjects()->attach($subject,[
            'created_at'=>'2022-05-21 16:48:16',
            'updated_at'=>'2022-05-21 16:48:16',
        ]);
        return response()->json($subject);
    }
    public function destroyClass(Subject $subject, User $user)
    {
        $user->subjects()->detach($subject);
    }
}
