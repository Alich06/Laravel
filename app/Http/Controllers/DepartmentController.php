<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $department = Department::all();
        return response()->json($department,200);
    }
    public function store(Request $request)
    {
        $validator= Validator::make($request->all(),[
            'department_name' => 'required|max:120',
            'department_code' => 'required|max:120',
        ]);

        if ($validator->fails()){
            return response()->json($validator->errors());
        }

        $department= Department::create([
           'department_name' =>$request->department_name,
           'department_code' =>$request->department_code,
        ]);
            return response()->json('Department Created Successfully',201);
    }
    public function show(Department $department)
    {
       $data= Department::find($department);
        return response()->json($data,200);
    }
    public function update(Request $request, Department $department)
    {
        $validator = Validator::make($request->all(),[
            'department_name' => 'required|max:120',
            'department_code' => 'required|max:120',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 204);
        }
        else{
            $department->department_name= $request->department_name;
            $department->department_code= $request->department_code;
            $department->save();
            return response()->json([
                'department' => $department,
                'message' => 'Department Updated Successfully',
            ], 200);
        }
    }
    public function destroy(Department $department)
    {
        $department->delete();
        return response()->json([
            'message'=> 'Department deleted Successfully',
        ],202);
    }
}
