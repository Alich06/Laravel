<?php

use App\Http\Controllers\AdminController;
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
Route::get('admin_data',[AdminController::class,'index']);

Route::middleware(['auth:sanctum'])->group(function (){
    Route::post('admin_logout',[AdminController::class,'logout']);
});


/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/
