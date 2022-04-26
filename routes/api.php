<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\TeacherController;
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
Route::post('admin_login',[AdminController::class,'login']);
Route::post('admin_register',[AdminController::class,'register']);
Route::post('teacher_login',[TeacherController::class,'login']);



Route::middleware(['auth:sanctum'])->group(function (){
    Route::get('admin_data',[AdminController::class,'index']);
    Route::get('teachers',[TeacherController::class,'index']);
    Route::post('teachers',[TeacherController::class,'store']);
    Route::get('teachers/{teacher}',[TeacherController::class,'show']);
    Route::put('teachers/{teacher}',[TeacherController::class,'update']);
    Route::delete('teachers/{teacher}',[TeacherController::class,'destroy']);
    Route::post('teacher_logout',[TeacherController::class,'logout']);
    Route::post('admin_logout',[AdminController::class,'logout']);
});


/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/
