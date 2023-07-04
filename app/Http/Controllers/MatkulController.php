<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Matkul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class MatkulController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $matkuls = Matkul::all();
        $dosen_id = Auth::id(); // Assuming you have the dosen_id available
        $matkuls = Matkul::where('dosen_id', $dosen_id)->get();

        return view('frontend.pages.matkul', ['matkuls' => $matkuls]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('frontend.pages.dosen.matkul.tambah-matkul');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'nama_matkul' => 'required',
            'video_url' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required',
            'semester_id' => 'required',
            'hari' => 'required',
        ]);

        $nama_matkul = $request->input('nama_matkul');
        $video_url = $request->input('video_url');
        $deskripsi = $request->input('deskripsi');
        $gambar = $request->input('gambar');
        $semester_id = $request->input('semester_id');
        $hari = $request->input('hari');

        $userId = Auth::user()->nim_mhs;

        $videoId = extractVideo($video_url);

        // Matkul::create([
        //     'nama_matkul' => $nama_matkul,
        //     'dosen_id' => $userId,
        //     'semester_id' => $semester_id,
        //     'video_url' => $videoId,
        //     'deskripsi' => $deskripsi,
        //     'gambar' => $gambar,
        //     'hari' => $hari,
        // ]);

        $matkul = new Matkul;
        $matkul->nama_matkul = $nama_matkul;
        $matkul->dosen_id = $userId;
        $matkul->semester_id = $semester_id;
        $matkul->video_url = $videoId;
        $matkul->deskripsi = $deskripsi;
        $matkul->gambar = $gambar;
        $matkul->hari = $hari;
        $matkul->save();

        Session::flash('success');

        return redirect()->back();
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
