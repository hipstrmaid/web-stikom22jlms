<?php

namespace App\Http\Controllers;

use App\Models\Matkul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class MatkulController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id = Auth::user()->dosen->id;
        $matkuls = Matkul::where('dosen_id', $id)->get();

        return view('frontend.pages.matkul', ['matkuls' => $matkuls]);
    }

    // public function indexmatkul(string $id)
    // {

    //     $matkuls = Matkul::where('dosen_id', $id)->get();
    //     @dd($matkuls);

    //     return view('frontend.pages.matkul', ['matkuls' => $matkuls]);
    // }


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
            'deskripsi' => 'required|min:100',
            'gambar' => 'required|file',
            'semester_id' => 'required',
            'hari' => 'required',
            'prodi' => 'required',
        ]);

        $nama_matkul = $request->input('nama_matkul');
        $video_url = $request->input('video_url');
        $deskripsi = $request->input('deskripsi');
        $semester_id = $request->input('semester_id');
        $hari = $request->input('hari');
        $prodi_id = $request->input('prodi');
        $kode_mk = $request->input('kode_matkul');

        $gambar = $request->file('gambar'); // Use file() instead of input()

        $gambarPath = $gambar->store('public/fotos'); // Store the file




        $userId = Auth::user()->dosen->id;
        $videoId = extractVideo($video_url);

        $matkul = new Matkul;
        $matkul->nama_matkul = $nama_matkul;
        $matkul->dosen_id = $userId;
        $matkul->video_url = $videoId;
        $matkul->deskripsi = $deskripsi;
        $matkul->gambar = $gambarPath;

        // // Delete old photo if it exists and replace it with the new one
        // if ($matkul->gambar) {
        //     Storage::delete($matkul->gambar); // Delete old photo
        // }

        $matkul->semester_id = $semester_id;
        $matkul->prodi_id = $prodi_id;
        $matkul->hari = $hari;

        $matkul->kode_matkul = $kode_mk;
        $matkul->save();

        Session::flash('success');

        // return redirect(route('dashboard.index'));
        return redirect('/matkul');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $matkul = Matkul::findOrFail($id);
        $matkul->load('dosen');
        return view('frontend.pages.matkul-preview', compact('matkul'));
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
