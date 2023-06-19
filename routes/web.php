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

Route::get('/matkul/belajar', function () {
    return view('frontend.pages.matkul-belajar');
});
