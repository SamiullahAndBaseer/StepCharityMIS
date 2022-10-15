<?php

use App\Http\Controllers\AttendanceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin/dashboard');
    })->name('dashboard');
});

Route::resource('/user', UserController::class);
Route::get('/get-districts/{id}', [UserController::class, 'getDistricts']);
Route::get('/get-villages/{id}', [UserController::class, 'getVillages']);
Route::get('/searchUsers', [UserController::class, 'searchUsers'])->name('searchUser');

Route::get('/user-attendance', [AttendanceController::class, 'index'])->name('user.attendance');
