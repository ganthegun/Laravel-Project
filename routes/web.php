<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\PlatinumController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;

// log in and sign up routes
// show login form
Route::get('/', [LoginController::class, 'showLoginForm'])->name('login')->middleware('guest');

// authenticate user
Route::post('/authenticate', [LoginController::class, 'login'])->name('authenticate');

// show index page
Route::get('/index', [LoginController::class, 'index'])->name('index')->middleware('auth');

// logoout user
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

// show registration form
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register')->middleware('auth');

// create new platinum
Route::post('/create/{currentUser}', [RegisterController::class, 'register'])->name('create')->middleware('auth');

// manage user profile routes
// show user profile or show platinum profile for staff
Route::get('/user', [UserController::class, 'index'])->name('user.index')->middleware('auth');

// show edit form
Route::get('/user/edit', [UserController::class, 'edit'])->name('user.edit')->middleware('auth');

// update user profile
Route::put('/user/update', [UserController::class, 'update'])->name('user.update')->middleware('auth');

// show reset password form
Route::get('/password/reset', [ResetPasswordController::class, 'showResetForm'])->name('password.reset')->middleware('auth');

// reset user password
Route::post('/password/update', [ResetPasswordController::class, 'reset'])->name('password.update')->middleware('auth');

// exclusive for staff
// show manage platinum page
Route::get('/staff', [StaffController::class, 'manage'])->name('staff.manage')->middleware('auth');

// show platinum profile
Route::get('/staff/{user}', [StaffController::class, 'index'])->name('staff.index')->middleware('auth');

// show edit platinum form
Route::get('/staff/edit/{user}', [StaffController::class, 'edit'])->name('staff.edit')->middleware('auth');

// update platinum profile
Route::put('/staff/update/{user}', [StaffController::class, 'update'])->name('staff.update')->middleware('auth');

// update platinum and crmp role
Route::post('/change-role', [StaffController::class, 'changeRole'])->name('change-role')->middleware('auth');

// delete platinum and crmp
Route::delete('/delete/{user}', [StaffController::class, 'destroy'])->name('staff.delete')->middleware('auth');

// list all user
Route::get('/list', [StaffController::class, 'list'])->name('staff.list')->middleware('auth');

// list all platinums and crmp
Route::get('/list/platinum', [PlatinumController::class, 'list'])->name('platinum.list')->middleware('auth');

// generate report
Route::get('/report', [StaffController::class, 'report'])->name('staff.report')->middleware('auth');