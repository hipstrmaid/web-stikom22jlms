<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatkulController;
use App\Http\Controllers\PertemuanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Models\Matkul;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/calendar', function () {
    return view('frontend.pages.calendar');
});

// Route::get('/belajar', function () {
//     return view('frontend.pages.mahasiswa.pertemuan.mahasiswa-pertemuan');
// });



// Laravel authentication routes
Auth::routes();

// Routes accessible by authenticated users only
Route::middleware('auth')->group(function () {
    Route::resource('dashboard', DashboardController::class);


    Route::resource('matkul', MatkulController::class);
    Route::resource('pertemuan', PertemuanController::class);
    Route::get('matkul/{id}/pertemuan', [PertemuanController::class, 'indexPertemuan'])->name('pertemuan.indexPertemuan');


    Route::get('/profile/edit', [ProfileController::class, 'editProfile'])->name('edit-profile');
    Route::get('user/{user}/editPassword', [ProfileController::class, 'editPassword'])->name('user.editPassword');
    Route::put('user/{user}/updatePassword', [ProfileController::class, 'updatePassword'])->name('user.updatePassword');


    Route::resource('mahasiswa', MahasiswaController::class);
    Route::resource('dosen', DosenController::class);

    Route::get('/user/preferences', function () {
        return view('frontend.pages.preferences');
    })->name('user.preferences');



    // Routes for admins
    Route::middleware(['admin'])->group(function () {

        Route::resource('admin', AdminController::class);
        Route::resource('role', RoleController::class);
        Route::resource('user', UserController::class)->except(['create']);
        Route::get('/admin/create/mahasiswa', [UserController::class, 'indexMahasiswa'])->name('user.tambahMahasiswa');
        Route::get('/admin/create/dosen', [UserController::class, 'indexDosen'])->name('user.tambahDosen');
        Route::get('/admin/create/admin', [UserController::class, 'indexAdmin'])->name('user.tambahAdmin');
        // Add more admin-specific routes here

    });
});
