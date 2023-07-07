<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [App\Http\Controllers\WelcomeController::class, 'index'])->name('welcome');
Route::get('/jobs/{id}', [App\Http\Controllers\WelcomeController::class, 'show'])->name('job.details');

Route::get('/freelancer', function () {
    return view('freelancer');
});

// User Route
Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\UserController::class, 'index'])->name('dashboard');

Route::get('/profile/{id}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('profile.edit');
Route::patch('/profile/{id}/profile-update', [App\Http\Controllers\UserController::class, 'profileUpdate'])->name('profile.update');
Route::put('/profile/{id}/email-update', [App\Http\Controllers\UserController::class, 'emailUpdate'])->name('email.update');
Route::put('/profile/{id}/password-update', [App\Http\Controllers\UserController::class, 'passwordUpdate'])->name('password.update');
Route::delete('/profile/{id}/delete-user', [App\Http\Controllers\UserController::class, 'deleteUser'])->name('delete.user');

// Employer Route
Route::get('employer/login', [App\Http\Controllers\Auth\LoginController::class, 'showEmployerLoginForm'])->name('employer.login');
Route::post('employer/login', [App\Http\Controllers\Auth\LoginController::class, 'employerLogin'])->name('employer.login.submit');

Route::get('employer/register', [App\Http\Controllers\Auth\RegisterController::class, 'showEmployerRegisterForm'])->name('employer.register');
Route::post('employer/register', [App\Http\Controllers\Auth\RegisterController::class, 'createEmployer'])->name('employer.register.submit');

// Route::group(['middleware' => ['employer']], function() {});
Route::post('employer/logout',[App\Http\Controllers\Auth\LoginController::class,'employerLogout'])->name('employer.logout');
Route::get('employer/dashboard', [App\Http\Controllers\EmployerController::class, 'index'])->name('employer.dashboard');

Route::get('/employer/profile/{id}/edit', [App\Http\Controllers\EmployerController::class, 'edit'])->name('employer.edit');
Route::patch('/employer/profile/{id}/profile-update', [App\Http\Controllers\EmployerController::class, 'profileUpdate'])->name('employer.profile.update');
Route::put('/employer/profile/{id}/email-update', [App\Http\Controllers\EmployerController::class, 'emailUpdate'])->name('employer.email.update');
Route::put('/employer/profile/{id}/password-update', [App\Http\Controllers\EmployerController::class, 'passwordUpdate'])->name('employer.password.update');
Route::delete('/employer/profile/{id}/delete-user', [App\Http\Controllers\EmployerController::class, 'deleteUser'])->name('delete.employer');

Route::get('/employer/job/create', [App\Http\Controllers\JobController::class, 'create'])->name('job.create');
Route::post('/employer/job/store', [App\Http\Controllers\JobController::class, 'store'])->name('job.store');
Route::get('/employer/job/{id}', [App\Http\Controllers\JobController::class, 'show'])->name('job.show');
Route::get('/employer/job/{id}/edit', [App\Http\Controllers\JobController::class, 'edit'])->name('job.edit');
Route::patch('/employer/job/{id}/update', [App\Http\Controllers\JobController::class, 'update'])->name('job.update');
Route::delete('/employer/job/{id}/delete', [App\Http\Controllers\JobController::class, 'destroy'])->name('job.delete');
