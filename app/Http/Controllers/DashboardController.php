<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Prodi;
use App\Models\Matkul;
use App\Models\Mtr_file;
use App\Models\Mtr_image;
use App\Models\Mtr_video;
use App\Models\Pertemuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard after Authenticated.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        if (Auth::user()->role_id != 4) {
            $matkuls = Matkul::all()->groupBy('semester_id')->sortBy(function ($items, $key) {
                return $key;
            });

            return view('frontend.pages.dashboard', ['matkuls' => $matkuls]);
        } else {
            $mahasiswaTotal = User::where('role_id', 1)->count();
            $dosenTotal = User::where('role_id', 2)->count();
            $baakTotal = User::where('role_id', 3)->count();
            $adminTotal = User::where('role_id', 4)->count();

            $matkulTotal = Matkul::count();
            $prodiTotal = Prodi::where('nama_prodi', '!=', 'Belum ada Prodi')->count();
            $pertemuanTotal = Pertemuan::count();
            $file = Mtr_file::count();
            $img = Mtr_image::count();
            $vid = Mtr_video::count();
            $materiTotal = $file + $img + $vid;

            return view('admin.admin-dashboard', compact('materiTotal', 'pertemuanTotal', 'prodiTotal', 'mahasiswaTotal', 'dosenTotal', 'baakTotal', 'adminTotal', 'matkulTotal'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
