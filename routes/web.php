<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppointmentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\SpecialtyController;
use App\Models\Doctor;

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

Route::get("/", function() {
    return view("admin.dashboard.home");
});
Route::get('/home', function () {
    $doctors = Doctor::get();
    return view('user.index', compact('doctors'));

});

Route::resource("doctor", DoctorController::class);
Route::resource("specialty", SpecialtyController::class);
Route::resource("appointment", AppointmentController::class);

/*
*******************************************
******************************************
*/


Route::get('showdoctor', [AdminController::class, 'index'])->name('showdoctor');
Route::get("deletedoctor/{id}", [AdminController::class, 'deleteDoctor'])->name('deletedoctor');
Route::get('editdoctor/{id}', [AdminController::class, 'edit'])->name("editdoctor");
Route::post('updatedoctor/{id}', [AdminController::class, 'update'])->name("updatedoctor");

/*
*******************************************
******************************************
*/


Route::get('approve/{id}', [AppointmentController::class, 'approve']);
Route::post('appointment/store', [DoctorController::class, 'storeAppointment'])->name("appointment.store");
Route::get('getappointment', [DoctorController::class, 'getAppointments'])->name("appointments");
Route::get('cancelappointment/{id}', [DoctorController::class, 'cancelAppointment'])->name("appointment.cancel");
