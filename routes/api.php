<?php

use App\Http\Controllers\Api\AppointmentController;
use App\Http\Controllers\Api\Authcontroller;
use App\Http\Controllers\Api\DoctorController;
use App\Http\Controllers\Api\ProductController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::resource('doctor', DoctorController::class);
Route::resource('user', Authcontroller::class);
Route::post("login", [Authcontroller::class, 'login']);
Route::post("updatedoctor/{id}", [DoctorController::class, 'updateDoctor']);
Route::resource('appointment', AppointmentController::class);
Route::get("approve/{id}", [AppointmentController::class, 'approve']);