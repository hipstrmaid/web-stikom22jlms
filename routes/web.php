<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatkulController;
use App\Http\Controllers\RoleController;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    Route::resource('guest', GuestController::class);
});

// Laravel authentication routes
Auth::routes();

// Routes accessible by authenticated users only
Route::middleware('auth')->group(function () {
    Route::resource('dashboard', DashboardController::class);
    Route::resource('matkul', MatkulController::class);
    Route::resource('mahasiswa', MahasiswaController::class);
    Route::resource('dosen', DosenController::class);

    Route::controller(DosenController::class)->group(function () {
        Route::get('/dosen/{id}/profile', 'editProfile')->name('dosen.editProfile');
        Route::put('/dosen/{id}/store-profile', 'storeProfile')->name('dosen.storeProfile');
        Route::put('/dosen/{id}/edit-profilee', 'updateProfile')->name('dosen.updateProfile');
        Route::get('/dosen/{id}/view', 'viewProfile')->name('dosen.viewProfile');
    });
    // route::get("/dosen/{id}/profile", [DosenController::class, 'editProfile'])->name('dosen.editProfile');
    // route::put("/dosen/{id}/store-profile", [DosenController::class, 'storeProfile'])->name('dosen.storeProfile');
    // route::put("/dosen/{id}/edit-profile", [DosenController::class, 'updateProfile'])->name('dosen.updateProfile');
    // route::get("/dosen/{id}/view", [DosenController::class, 'viewProfile'])->name('dosen.viewProfile');

    route::put("/mahasiswa/{id}/edit-profile", [MahasiswaController::class, 'updateProfile'])->name('mahasiswa.updateProfile');
    route::get("/mahasiswa/{id}/profile", [MahasiswaController::class, 'editProfile'])->name('mahasiswa.editProfile');
    route::put("/mahasiswa/{id}/edit-profile", [MahasiswaController::class, 'updateProfile'])->name('mahasiswa.updateProfile');
    route::get("/mahasiswa/{id}/view", [MahasiswaController::class, 'viewProfile'])->name('mahasiswa.viewProfile');


    // Routes for admins
    Route::middleware(['admin'])->group(function () {
        Route::resource('admin', AdminController::class);
        Route::controller(AdminController::class)->group(function () {
            Route::get('/dosen/{id}/update-profile', 'updateProfile')->name('dosen.updateProfile');
        });
        Route::resource('role', RoleController::class);
        Route::resource('user', UserController::class)->except(['create']);
        Route::get('/user/create/mahasiswa', [UserController::class, 'indexMahasiswa'])->name('user.tambahMahasiswa');
        Route::get('/user/create/dosen', [UserController::class, 'indexDosen'])->name('user.tambahDosen');
        Route::get('/user/create/admin', [UserController::class, 'indexAdmin'])->name('user.tambahAdmin');
        // Add more admin-specific routes here
    });
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/calendar', function () {
    return view('frontend.pages.calendar');
});
