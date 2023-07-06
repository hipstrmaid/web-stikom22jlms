<?php

namespace App\Http\Controllers;

use App\Models\Matkul;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index()
    {
        $matkuls = Matkul::all()->groupBy('semester_id');
        return view('frontend.pages.guest.dashboard', ['matkuls' => $matkuls]);
    }
}
