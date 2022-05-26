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
            'created_at'=>now()->timestamp,
            'updated_at'=>now()->timestamp,
        ]);
        return response()->json($subject);
    }
    public function destroyClass(Subject $subject, User $user)
    {
        $user->subjects()->detach($subject);
    }
}
