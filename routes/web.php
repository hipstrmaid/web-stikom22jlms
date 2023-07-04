<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;



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


// Public route
Route::get('/login', function () {
    return view('auth.login');
});

// Routes accessible by guest users only
Route::middleware('guest')->group(function () {
    Route::get('/guest', function () {
        return view('frontend.pages.guest.dashboard');
    });
});

// Laravel authentication routes
Auth::routes();

// Routes accessible by authenticated users only
Route::middleware('auth')->group(function () {
    Route::resource('user', UserController::class);
    Route::resource('mahasiswa', MahasiswaController::class);
    Route::get('/mahasiswa/{mahasiswa}/profile', [MahasiswaController::class, 'viewProfile'])->name('mahasiswa.viewProfile');

    // Routes for admins
    Route::middleware(['admin'])->group(function () {
        Route::resource('admin', AdminController::class);
        Route::resource('role', RoleController::class);
        // Add more admin-specific routes here
    });

    Route::get('/dashboard', function () {
        return view('frontend.pages.dashboard');
    });
});

Route::get('/', function () {
    return view('welcome');
});
