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
    return view('frontend.pages.dashboard');
});

Route::get('/matkul/matkul-saya', function () {
    return view('frontend.pages.matkul-saya');
});

Route::get('/matkul/preview', function () {
    return view('frontend.pages.matkul-preview');
});

Route::get('/matkul/pertemuan', function () {
    return view('frontend.pages.matkul-pertemuan');
});

Route::get('/matkul/pertemuan/belajar', function () {
    return view('frontend.pages.matkul-belajar');
});

Route::get('/matkul/dosen', function () {
    return view('frontend.pages.dosen.matkul-dosen');
});

Route::get('/matkul/edit-matkul', function () {
    return view('frontend.pages.dosen.matkul.matkul-edit');
});

Route::get('/matkul/edit-jadwal', function () {
    return view('frontend.pages.dosen.matkul.matkul-jadwal');
});
