<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//Route::get('dataa',[\App\Http\Controllers\MarkController::class,'show']);

Route::post('login',[UserController::class,'login']);
Route::post('register',[UserController::class,'register']);
/*Route::post('teacher_login',[TeacherController::class,'login']);
Route::post('student_login',[StudentController::class,'login']);*/





Route::middleware(['auth:sanctum'])->group(function (){
    Route::get('teacher_count',[AdminController::class,'getTeacherNo']);
    Route::get('student_count',[AdminController::class,'getStudentNo']);
    Route::get('users/{role_name}',[UserController::class,'index']);
    Route::get('users/{role_name}/{user}',[UserController::class,'show']);
    Route::put('users/{user}',[UserController::class,'update']);
    Route::delete('users/{role_name}/{user}',[UserController::class,'destroy']);
    Route::post('logout',[UserController::class,'logout']);
    Route::get('department',[DepartmentController::class,'index']);
    Route::post('department',[DepartmentController::class,'store']);
    Route::get('department/{department}',[DepartmentController::class,'show']);
    Route::put('department/{department}',[DepartmentController::class,'update']);
    Route::delete('department/{department}',[DepartmentController::class,'destroy']);
});


/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/
/* Route::get('admin_data',[AdminController::class,'index']);
  Route::get('teachers',[TeacherController::class,'index']);
  Route::post('teachers',[TeacherController::class,'store']);
  Route::get('teachers/{teacher}',[TeacherController::class,'show']);
  Route::put('teachers/{teacher}',[TeacherController::class,'update']);
  Route::delete('teachers/{teacher}',[TeacherController::class,'destroy']);
  Route::post('teacher_logout',[TeacherController::class,'logout']);*/
/* Route::get('teachers',[StudentController::class,'index']);
 Route::post('teachers',[StudentController::class,'store']);
 Route::get('students/{students}',[StudentController::class,'show']);
 Route::put('students/{students}',[StudentController::class,'update']);
 Route::delete('students/{students}',[StudentController::class,'destroy']);
 Route::post('student_logout',[StudentController::class,'logout']);*/
