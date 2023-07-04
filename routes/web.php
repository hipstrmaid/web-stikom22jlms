<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatkulController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
    Route::resource('dashboard', DashboardController::class);
    Route::get('/user/mahasiswa', [UserController::class, 'indexMahasiswa'])->name('user.indexMahasiswa');
    Route::get('/user/dosen', [UserController::class, 'indexDosen'])->name('user.indexDosen');
    Route::resource('user', UserController::class);
    Route::resource('mahasiswa', MahasiswaController::class);
    Route::resource('dosen', DosenController::class);
    route::get("/dosen/edit-profile/{id}", [DosenController::class, 'editProfile'])->name('dosen.editProfile');
    // route::post("/dosen/update-profile/{id}", [DosenController::class, 'updateProfile'])->name('dosen.updateProfile');
    Route::resource('matkul', MatkulController::class);




    Route::get('/mahasiswa/{mahasiswa}/profile', [MahasiswaController::class, 'viewProfile'])->name('mahasiswa.viewProfile');
    Route::put('/mahasiswa/{mahasiswa}/edit', [MahasiswaController::class, 'edit'])->name('mahasiswa.edit');



    // Routes for admins
    Route::middleware(['admin'])->group(function () {
        Route::resource('admin', AdminController::class);
        Route::resource('role', RoleController::class);
        // Add more admin-specific routes here
    });

    // Route::get('/dashboard', function () {
    //     return view('frontend.pages.dashboard');
    // });
});

Route::get('/', function () {
    return view('welcome');
});
