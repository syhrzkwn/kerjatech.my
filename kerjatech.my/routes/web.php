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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/freelance', function () {
    return view('freelance');
});

// User Route
Auth::routes();

Route::get('/profile', [App\Http\Controllers\UserController::class, 'index'])->name('profile');

Route::get('/profile/{id}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('profile.edit');
Route::post('/profile/{id}/profile-update', [App\Http\Controllers\UserController::class, 'profileUpdate'])->name('profile.update');
Route::post('/profile/{id}/email-update', [App\Http\Controllers\UserController::class, 'emailUpdate'])->name('email.update');
Route::post('/profile/{id}/password-update', [App\Http\Controllers\UserController::class, 'passwordUpdate'])->name('password.update');
Route::post('/profile/{id}/delete-user', [App\Http\Controllers\UserController::class, 'deleteUser'])->name('delete.user');

// Employer Route
Route::get('employer/login', [App\Http\Controllers\Auth\LoginController::class, 'showEmployerLoginForm'])->name('employer.login');
Route::post('employer/login', [App\Http\Controllers\Auth\LoginController::class, 'employerLogin'])->name('employer.login.submit');

Route::get('employer/register', [App\Http\Controllers\Auth\RegisterController::class, 'showEmployerRegisterForm'])->name('employer.register');
Route::post('employer/register', [App\Http\Controllers\Auth\RegisterController::class, 'createEmployer'])->name('employer.register.submit');

// Route::group(['middleware' => ['employer']], function() {});
Route::post('employer/logout',[App\Http\Controllers\Auth\LoginController::class,'employerLogout'])->name('employer.logout');
Route::get('employer/profile', [App\Http\Controllers\EmployerController::class, 'index'])->name('employer.profile');

Route::get('/employer/profile/{id}/edit', [App\Http\Controllers\EmployerController::class, 'edit'])->name('employer.edit');
Route::post('/employer/profile/{id}/profile-update', [App\Http\Controllers\EmployerController::class, 'profileUpdate'])->name('employer.profile.update');
Route::post('/employer/profile/{id}/email-update', [App\Http\Controllers\EmployerController::class, 'emailUpdate'])->name('employer.email.update');
Route::post('/employer/profile/{id}/password-update', [App\Http\Controllers\EmployerController::class, 'passwordUpdate'])->name('employer.password.update');
Route::post('/employer/profile/{id}/delete-user', [App\Http\Controllers\EmployerController::class, 'deleteUser'])->name('delete.employer');
