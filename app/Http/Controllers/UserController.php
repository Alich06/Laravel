<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if(!$user || !Hash::check($request->password, $user->password)){
            return response([
                'message' => 'The provided credentials are incorrect.'
            ], 401);
        }

        $token = $user->createToken($request->email)->plainTextToken;

        return response([
            'user' => $user,
            'token' => $token
        ], 200);

    }

    public function register(Request $request){
        $request->validate([
            'first_name' => 'required|max:120',
            'last_name' => 'required|max:120',
            'father_name' => 'required|max:120',
            'email' => 'required|email|unique:users,email',
            'role_name' => 'required',
            'password' => 'required|confirmed',
            'phone_no' => 'required',
            'age' => 'required|integer',
            'gender' => 'required',
            'picture' => 'required|image:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        if ($request->hasFile('picture')){
            if ($request->file('picture')->isValid()){
                $validated= $request->validate([
                    'picture'=>'required|image|mimes:jpg,bmp,png|max:2048',
                ]);
                $extension= $request->picture->extension();
                $image_name=time().'.'.$extension;
                $request->picture->storeAs('/public/media',$image_name);
            }
        }
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'father_name' => $request->father_name,
            'role_name' => $request->role_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone_no' => $request->phone_no,
            'age' => $request->age,
            'gender' => $request->gender,
            'picture' => $image_name,
        ]);

        $token = $user->createToken($request->email)->plainTextToken;

        return response([
            'user' => $user,
            'token' => $token
        ], 200);
    }

    public function logout(){
        auth()->user()->tokens()->delete();
        return response([
            'message' => 'Successfully Logged Out !!'
        ]);
    }

    public function index($role_name){
        $data= User::where('role_name',$role_name)->get();
        return response()->json($data,201);
    }

    public function show($role_name , User $user)
    {
        $data= User::find($user)->where('role_name',$role_name)->first();
        return response()->json($data,201);
    }
    public function update(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|max:120',
            'last_name' => 'required|max:120',
            'father_name' => 'required|max:120',
            'phone_no' => 'required',
            'age' => 'required|integer',
            'gender' => 'required',
            'picture' => 'required|image:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 204);
        }
        else{
            $input = $request->all();
            if ($request->hasFile('picture')) {
                Storage::delete('/public/media/'.$user->picture);
                if ($request->file('picture')->isValid()) {
                    $validated = $request->validate([
                        'picture' => 'required|image|mimes:jpg,bmp,png|max:2048',
                    ]);
                    $extension = $request->picture->extension();
                    $image_name = time() . '.' . $extension;
                    $request->picture->storeAs('/public/media', $image_name);
                    $input['picture'] = $image_name;
                }
            }
            $user->update($input);
            return response()->json([
                'User' => $user,
                'message' => 'User Updated Successfully',
            ], 200);
        }
    }
    public function destroy($role_name,User $user)
    {
        $user->where('role_name',$role_name)->delete();
        return response()->json([
            'message'=> 'Teacher deleted Successfully',
        ],202);
    }

}
