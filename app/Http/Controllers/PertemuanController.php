<?php

namespace App\Http\Controllers;

use App\Models\Matkul;
use App\Models\Pertemuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PertemuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id = Auth::user()->dosen->id;
        $matkuls = Matkul::where('dosen_id', $id)->get();
        //Cari matkul
        $matkul = Matkul::with('semester', 'prodi')->first();

        $pertemuan = Pertemuan::where('matkul_id', $matkuls)->get();
        return view('frontend/pages/dosen/pertemuan/view-pertemuan', ['matkul' => $matkul], ['pertemuans' => $pertemuan]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('frontend/pages/dosen/pertemuan/tambah-pertemuan');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_matkul' => 'required',
            'video_url' => 'required',
            'deskripsi' => 'required|min:100',
            'gambar' => 'required|file',
            'semester_id' => 'required',
            'hari' => 'required',
            'prodi' => 'required',
        ]);
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
