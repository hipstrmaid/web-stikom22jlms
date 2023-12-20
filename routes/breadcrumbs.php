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
    $trail->push('Matkul', route('matkul.index'));
});

// Dashboard > Mata Kuliah
Breadcrumbs::for('enrollMatkul', function (BreadcrumbTrail $trail) {
    $trail->parent('matkul'); // Parent routes (Pilih salah solo route)
    $trail->push('Enroll', route('enroll.index'));
});

// Dashboard > Mata Kuliah > Edit Matkul
Breadcrumbs::for('editMatkul', function (BreadcrumbTrail $trail, $matkul) {
    $trail->parent('matkul'); // Parent routes (Pilih salah solo route)
    $trail->push('Edit Matkul', route('matkul.edit', $matkul));
});

// Dashboard > Mata Kuliah >  Pertemuan
Breadcrumbs::for('previewMatkul', function (BreadcrumbTrail $trail, $matkul) {
    $trail->parent('matkul');
    $trail->push('Pertemuan', route('matkul.pertemuanPreview', ['id' => $matkul]));
});

// Dashboard > Mata Kuliah > Pertemuan > Belajar
Breadcrumbs::for('mhsBelajar', function (BreadcrumbTrail $trail, $matkul, $pertemuan) {
    $trail->parent('previewMatkul', $matkul); // Pass the $matkul parameter here
    $trail->push('Belajar', route('pertemuan.show', ['pertemuan' => $pertemuan]));
});


// Dashboard > Mata Kuliah > Pertemuan > Belajar > Tugas
Breadcrumbs::for('mhsTugas', function (BreadcrumbTrail $trail, $matkul, $pertemuan, $tgs) {
    $trail->parent('mhsBelajar', $matkul, $pertemuan); // Pass the $matkul parameter here
    $trail->push('Tugas', route('tugas.show', ['tuga' => $tgs]));
});


// Dashboard > Mata Kuliah > {Nama Matkul} > Pertemuan
Breadcrumbs::for('indexPertemuan', function (BreadcrumbTrail $trail, $matkul) {
    $trail->parent('editMatkul', $matkul);
    $trail->push('Pertemuan', route('pertemuan.indexPertemuan', ['id' => $matkul->id]));
});

// // Dashboard > Mata Kuliah > Belajar
Breadcrumbs::for('createPertemuan', function (BreadcrumbTrail $trail, $matkul_id) {
    $trail->parent('editMatkul', $matkul_id);
    $trail->push('Create', route('pertemuan.create', $matkul_id));
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
