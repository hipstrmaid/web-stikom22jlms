<?php

namespace App\Http\Controllers;

use App\Models\Matkul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        // if (Auth::check()) {
        //     Auth::logout();
        // }
        $matkuls = Matkul::all()->groupBy('semester_id')->sortBy(function ($items, $key) {
            return $key;
        });
        return view('welcome', ['matkuls' => $matkuls]);
    }
}
