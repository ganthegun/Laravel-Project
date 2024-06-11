<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\PlatinumController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\ExpertController;


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

//Expert Module Routes
Route::get('/newExpert', function () {
    return view('expert.newExpert');
})->middleware(['auth', 'verified'])->name('expert.newExpert');

// Route::get('/expert/newExpert', [ExpertController::class, 'newExpert'])->name('expert.newExpert'); // Route to show the form
Route::post('/expert', [ExpertController::class, 'createExpert'])->name('expert.createExpert');                    // Route to handle the form submission
Route::get('/myExpert', [ExpertController::class, 'myExpertList'])->name('expert.myExpertList');                   // Route to list my experts
Route::get('/expert/{id}', [ExpertController::class, 'detailExpert'])->name('expert.detailExpert');                // Route for expert detail
Route::get('/expert', [ExpertController::class, 'expertList'])->name('expert.expertList');                         // Route for expert list
Route::get('/expert/{id}/update', [ExpertController::class, 'updateExpert'])->name('expert.updateExpert');         // Route for update expert
Route::put('/expert/{id}', [ExpertController::class, 'update'])->name('expert.detailExpert');                      // Route for save update
Route::get('/expert/{id}/confirmRemove', [ExpertController::class, 'confirmRemove'])->name('expert.confirmRemove');// Route for confirm remove
Route::post('/expert/{id}/remove', [ExpertController::class, 'destroy'])->name('expert.removeExpert');             // Route for remove expert

Route::get('/search', [ExpertController::class, 'search'])->name('searchExpert.search');

Route::get('/expert/publication/new/{id}', [ExpertController::class, 'createPublication'])->name('expert.publication.addPublication');
Route::post('/expert/publication/create', [ExpertController::class, 'store'])->name('expert.publication.createPublication');
Route::get('/expert/publication/{id}', [ExpertController::class, 'viewPublication'])->name('expert.publication.viewPublication');// Route for publication detail
Route::get('/expert/publication/{id}/update', [ExpertController::class, 'editPublication'])->name('expert.publication.editPublication');// Route for publication edit
Route::put('/expert/publication/{id}', [ExpertController::class, 'updatePublication'])->name('expert.publication.viewPublication');// Route for publication detail
Route::get('/expert/publication/{id}/confirmRemove', [ExpertController::class, 'confirmDelete'])->name('expert.publication.confirmDelete');// Route for confirm remove
Route::post('/expert/publication/{id}/remove', [ExpertController::class, 'delete'])->name('expert.publication.deletePublication');
