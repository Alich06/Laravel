<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class TeacherController extends Controller
{
    public function login(Request $request){
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $teacher = Teacher::where('email', $request->email)->first();

    if(!$teacher || !Hash::check($request->password, $teacher->password)){
        return response([
            'message' => 'The provided credentials are incorrect.'
        ], 401);
    }

    $token = $teacher->createToken($request->email)->plainTextToken;

    return response([
        'user' => $teacher,
        'token' => $token
    ], 200);

}
    public function logout(){
        auth()->user()->tokens()->delete();
        return response([
            'message' => 'Successfully Logged Out !!'
        ]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $data= Teacher::all();
        return response()->json($data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:120',
            'email' => 'required|email|unique:teachers,email',
            'password' => 'required|confirmed',
            'phone_no'=> 'required',
        ]);
        $teacher= Teacher::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone_no' => $request->phone_no,
        ]);
        return response([
            'user' => $teacher,
            'message' => 'Created a teacher Sucessfully!'
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Teacher $teacher)
    {
        $data= Teacher::find($teacher);
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Teacher $teacher)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:120',
            'phone_no' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 204);
        }
        else{
        $teacher->name= $request->name;
        $teacher->phone_no= $request->phone_no;
        $teacher->save();
        return response()->json([
            'Teacher' => $teacher,
            'message' => 'Teacher Updated Successfully',
        ], 200);
    }
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        return response()->json([
            'message'=> 'Teacher deleted Successfully',
        ],202);
    }
}
