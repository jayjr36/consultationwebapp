<?php

use App\Http\Controllers\DoctorScheduleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\AppointmentController;

Route::get('/', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/chat', function () {
    return view('chat');
})->name('chat');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('appointments/create', [AppointmentController::class, 'create'])->name('appointments.create');
Route::post('appointments', [AppointmentController::class, 'store'])->name('appointments.store');

Route::get('appointments', [AppointmentController::class, 'index'])->name('appointments.index');
Route::put('appointments/{appointment}/confirm', [AppointmentController::class, 'confirm'])->name('appointments.confirm');
Route::put('appointments/{appointment}/decline', [AppointmentController::class, 'decline'])->name('appointments.decline');

Route::get('doctors/{doctor}/profile', [DoctorController::class, 'profile'])->name('doctors.profile');
Route::put('doctors/{doctor}', [DoctorController::class, 'update'])->name('doctors.update');

Route::get('doctors/{doctor}/chat', [ChatController::class, 'index'])->name('doctors.chat');
Route::post('doctors/{doctor}/send', [ChatController::class, 'send'])->name('doctors.send');

Route::get('create', [ScheduleController::class, 'create'])->name('schedules.create');

    Route::post('/', [ScheduleController::class, 'store'])->name('schedules.store');

    Route::get('{schedule}/edit', [ScheduleController::class, 'edit'])->name('schedules.edit');

    Route::put('{schedule}', [ScheduleController::class, 'update'])->name('schedules.update');

    Route::delete('{schedule}', [ScheduleController::class, 'destroy'])->name('schedules.destroy');

    Route::get('/all-schedules', [DoctorScheduleController::class, 'index'])->name('schedules.index');


    Route::get('doctor-schedule-create', [ScheduleController::class, 'create'])->name('doctors.schedules.create');

    // Route to store a newly created schedule
    Route::post('doctor-schedule-save', [ScheduleController::class, 'store'])->name('doctors.schedules.store');

    // Route to view all schedules
    Route::get('doctor-schedule-all', [ScheduleController::class, 'index'])->name('doctors.schedules.index');
