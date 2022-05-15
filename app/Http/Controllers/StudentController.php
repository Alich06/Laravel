<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $student = Student::where('email', $request->email)->first();

        if(!$student || !Hash::check($request->password, $student->password)){
            return response([
                'message' => 'The provided credentials are incorrect.'
            ], 401);
        }

        $token = $student->createToken($request->email)->plainTextToken;

        return response([
            'user' => $student,
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
        $data= Student::all();
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
            'email' => 'required|email|unique:students,email',
            'password' => 'required|confirmed',
            'registration_no' => 'required|unique:students,registration_no',
            'address' => 'required',
            'phone_no'=> 'required',
        ]);
        $student= Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'registration_no' => $request->registration_no,
            'address' => $request->address,
            'phone_no' => $request->phone_no,
        ]);
        return response([
            'user' => $student,
            'message' => 'Created a student Sucessfully!'
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Student $student)
    {
        $data= Student::find($student);
        return response()->json($data);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Student $student)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:120',
            'phone_no' => 'required',
            'address' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 204);
        }
        else{
            $student->name= $request->name;
            $student->phone_no= $request->phone_no;
            $student->address= $request->address;
            $student->save();
            return response()->json([
                'Student' => $student,
                'message' => 'Student Updated Successfully',
            ], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return response()->json([
            'message'=> 'Student deleted Successfully',
        ],202);
    }
}
