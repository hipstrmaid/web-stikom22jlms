<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;
use Illuminate\Support\Facades\Auth;

// routes/breadcrumbs.php


// Home
// Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
//     $trail->push('Home', route('home'));
// });

// Dashboard (Solo Route)
Breadcrumbs::for('dashboard.index', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('dashboard.index'));
});


// Dashboard > Mata Kuliah
Breadcrumbs::for('matkul', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard.index'); // Parent routes (Pilih salah solo route)
    $trail->push('Mata kuliah', route('matkul.index'));
});

// Dashboard > Mata Kuliah > Edit Matkul
Breadcrumbs::for('editMatkul', function (BreadcrumbTrail $trail, $matkul) {
    $trail->parent('matkul'); // Parent routes (Pilih salah solo route)
    $trail->push($matkul->nama_matkul, route('matkul.edit', $matkul));
});

// Dashboard > Mata Kuliah > {Nama Matkul} > Pertemuan
Breadcrumbs::for('indexPertemuan', function (BreadcrumbTrail $trail, $matkul) {
    $trail->parent('editMatkul', $matkul);
    $trail->push('Pertemuan', route('pertemuan.indexPertemuan', ['id' => $matkul->id]));
});


// Dashboard > Mata Kuliah
Breadcrumbs::for('tambahMatkul', function (BreadcrumbTrail $trail) {
    $trail->parent('matkul'); // Parent routes (Pilih salah solo route)
    $trail->push('Tambah', route('matkul.create'));
});

// Dashboard > Profile
Breadcrumbs::for('mahasiswaView', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard.index'); // Parent routes (Pilih salah solo route)
    $trail->push('Profile', route('admin.show', ['admin' => Auth::user()->mahasiswa->id]));
});

Breadcrumbs::for('dosenView', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard.index');
    $trail->push('Profile', route('admin.show', ['admin' => Auth::user()->dosen->id]));
});

Breadcrumbs::for('adminView', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard.index');
    $trail->push('Profile', route('admin.show', ['admin' => Auth::user()->admin->id]));
});

// Dashboard > Edit Profile
Breadcrumbs::for('adminProfile', function (BreadcrumbTrail $trail) {
    $trail->parent('settings'); // Parent routes (Pilih salah solo route)
    $trail->push('Edit Profile', route('user.edit', ['user' => Auth::user()->admin->id]));
});


Breadcrumbs::for('dosenProfile', function (BreadcrumbTrail $trail) {
    $trail->parent('settings'); // Parent routes (Pilih salah solo route)
    $trail->push('Edit Profile', route('user.edit', ['user' => Auth::user()->dosen->id]));
});

Breadcrumbs::for('mahasiswaProfile', function (BreadcrumbTrail $trail) {
    $trail->parent('settings'); // Parent routes (Pilih salah solo route)
    $trail->push('Edit Profile', route('user.edit', ['user' => Auth::user()->mahasiswa->id]));
});

// Dashboard > Settings
Breadcrumbs::for('settings', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard.index'); // Parent routes (Pilih salah solo route)
    $trail->push('Settings', route('user.preferences'));
});

// Dashboard > Settings > Ganti Password
Breadcrumbs::for('ubahPassword', function (BreadcrumbTrail $trail) {
    $trail->parent('settings'); // Parent routes (Pilih salah solo route)
    $trail->push('Ganti Password', route('user.editPassword', ['user' => Auth::user()->id]));
});


// // Home > Blog
// Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
//     $trail->parent('home');
//     $trail->push('Dashboard', route('dashboard'));
// });
