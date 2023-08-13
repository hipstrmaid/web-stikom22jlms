<?php

namespace App\Http\Controllers;

use App\Models\Matkul;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $matkuls = Matkul::all()->groupBy('semester_id')->sortBy(function ($items, $key) {
            return $key;
        });

        return view('welcome', ['matkuls' => $matkuls]);
        // return view('home');
    }
}
