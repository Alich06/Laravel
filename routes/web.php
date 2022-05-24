<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ForgetPasswordController;
use App\Http\Controllers\ResetPasswordController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*Route::get('/', function () {
    return view('welcome');
});*/

//Reset Password
Route::post('password/forgot_password',[ForgetPasswordController::class, 'sendResetLinkResponse'])->name('passwords.sent');
Route::post('password/reset', [ResetPasswordController::class, 'sendResetResponse'])->name('passwords.reset');
