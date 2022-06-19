<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\TimeTable;
use App\Models\User;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function show()
    {
        $data= Attendance::all();
        return response()->json($data);
    }
    public function view(Attendance $attendance)
    {
        $student_id= $attendance->student_id;
        $class_id=$attendance->class_id;
        $student_data=User::find($student_id);
        $class_data=TimeTable::find($class_id);
        return response()->json([$attendance,$student_data,$class_data]);
    }

    public function create(Request $request)
    {
        $request->validate([
            'class_id' => 'required|numeric',
            'student_id' => 'required|numeric',
            'attendance_status' => 'required|numeric',
        ]);
        $already_attendance = Attendance::where('class_id', $request->class_id)
            ->where('student_id', $request->student_id)
            ->first();
        if (!empty($already_attendance))
        {
            return response()->json([
               'message'=> "Already attendance taken",
            ],409);
        }

        $store= Attendance::create($request->all());
        return response()->json([
            'details'=> $store,
            'message'=> 'Attendance Added Successfully',
            ],200);
    }

    public function update(Request $request, Attendance $attendance)
    {
        $request->validate([
            'class_id' => 'required|numeric',
            'student_id' => 'required|numeric',
            'attendance_status' => 'required|numeric',
        ]);
        $already_attendance = Attendance::where('class_id', $request->class_id)
            ->where('student_id', $request->student_id)
            ->first();
        if (!empty($already_attendance))
        {
            return response()->json([
                'message'=> "Already attendance taken",
            ],409);
        }
        $store= Attendance::update($request->all());
        return response()->json([
            'details'=> $store,
            'message'=> 'Attendance update Successfully',
        ],200);
    }

    public function destroy(Attendance $attendance)
    {
        $attendance->delete();
        return response()->json([
            'message'=> 'Attendance deleted Successfully',
        ],202);
    }
}
