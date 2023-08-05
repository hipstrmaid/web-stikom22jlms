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

Breadcrumbs::for('dashboard.index', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('dashboard.index'));
});


// Dashboard > Profile
Breadcrumbs::for('viewProfile', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard.index');
    $trail->push('Profile', route('user.index'));
});

// Dashboard > Edit Profile
Breadcrumbs::for('editProfile', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard.index');
    $trail->push('Edit Profile', route('user.edit', ['user' => Auth::user()->dosen->id]));
});


// // Home > Blog
// Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
//     $trail->parent('home');
//     $trail->push('Dashboard', route('dashboard'));
// });
