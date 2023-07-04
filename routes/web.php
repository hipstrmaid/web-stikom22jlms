<?php

use App\Http\Controllers\MahasiswaController;
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


// Routes accessible by authenticated users only
Route::middleware('auth')->group(function () {
    Route::resource('user', UserController::class);
    Route::resource('mahasiswa', MahasiswaController::class);

    Route::get('/admin', function () {
        return view('admin.admin-dashboard');
    });

    Route::get('/dashboard', function () {
        return view('frontend.pages.dashboard');
    });
});


// Routes accessible by guest users only
Route::middleware('guest')->group(function () {
    Route::get('/matkul/preview', function () {
        return view('frontend.pages.matkul-preview');
    });

    Route::get('/guest', function () {
        return view('frontend.pages.guest.dashboard');
    });
});


Route::get('/', function () {
    return view('welcome');
});

// Public route
Route::get('/login', function () {
    return view('auth.login');
});

// Laravel authentication routes
Auth::routes();
