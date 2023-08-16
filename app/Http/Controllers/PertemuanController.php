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
        //
    }


    public function indexPertemuan($id)
    {
        //$id di dapat dari route {{ route('pertemuan.indexPertemuan', ['id' => $matkul->id]) }} yang ada di Edit matkul
        // Find the Matkul model by ID di pass ke view untuk kembali ke Edit matkul page
        $id_matkul = Matkul::with('semester', 'prodi')->findOrFail($id);
        // Index semua pertemuan berdasarkan id yang di dapat dari page Edit matkul
        $pertemuans = Pertemuan::where('matkul_id', $id)->get();
        checkPermission($id_matkul->dosen_id, Auth::user()->dosen->id);
        return view('frontend/pages/dosen/pertemuan/view-pertemuan', compact('pertemuans', 'id_matkul'));
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
