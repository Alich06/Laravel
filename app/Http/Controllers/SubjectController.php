<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubjectController extends Controller
{
    public function create(Request $request, Department $department)
    {
        $validator= Validator::make($request->all(),[
            'subject_name' => 'required|max:120',
        ]);

        if ($validator->fails()){
            return response()->json($validator->errors());
        }
        $subject= $department->subject()->create([
            'subject_name'=>$request->subject_name,
        ]);
        return response()->json([
            'subject' => $subject,
            'message' => 'Course Added Successfully',
        ], 200);
    }
    public function show(Department $department)
    {
        $data= $department->subject;
        return response()->json([
            'Courses_detail'=>$data,
            ],201);
    }
    public function showWithDepartment(Department $department)
    {
        $data= $department->subject;
        return response()->json([
            'Department'=>$department,
        ],201);
    }
    public function destroy(Subject $subject)
    {
        $subject->delete();
        return response()->json([
            'message'=> 'Subject deleted Successfully',
        ],202);
    }
}
