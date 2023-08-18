<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Enroll;
use App\Models\Matkul;

use App\Models\Pertemuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class MatkulController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->dosen) {
            $id_dosen = Auth::user()->dosen->id;
            $matkuls = Matkul::with('semester', 'prodi')->where('dosen_id', $id_dosen)->get();
            return view('frontend.pages.matkul', ['matkuls' => $matkuls]);
        } else {
            $mahasiswa_id = Auth::user()->mahasiswa->id;
            $matkuls = Enroll::where('mahasiswa_id', $mahasiswa_id)->get();
            return view('frontend.pages.matkul', ['matkuls' => $matkuls]);
        }
    }

    // public function indexMatkulMhs()
    // {
    //     $id = Auth::user()->mahasiswa->id;
    //     $matkuls = Matkul::where('dosen_id', $id)->get();

    //     return view('frontend.pages.matkul', ['matkuls' => $matkuls]);
    // }

    public function pertemuanPreview($id)
    {
        //Ambil 1 record yang punya id di $id
        $matkul = Matkul::with('semester', 'prodi')->findOrFail($id);
        $pertemuans = Pertemuan::where('matkul_id', $id)->get();
        $lastPertemuan = Pertemuan::where('matkul_id', $id)->latest()->first();


        // dd($matkul);
        if (Auth::user()->dosen) {
            checkPermission($matkul->dosen_id, Auth::user()->dosen->id);
            return view('frontend/pages/dosen/pertemuan/dosen-pertemuan', compact('pertemuans', 'matkul', 'lastPertemuan'));
        } else {
            // $mahasiswa = Auth::user()->mahasiswa;
            // // Ambil semua record yang mahasiswa Enroll
            // $matkul_mahasiswa = $mahasiswa->enroll()->get();
            // // Ambil 1 record yang matkul_id nya sama dengan Matkul yang di click;
            // $enroll_id = $matkul_mahasiswa->where('matkul_id', $matkul->id)->first();

            $enroll_id = Matkul::where('id', $id)->first();

            // dd($enroll_id->id);
            // if ($enroll_id == null) {
            //     abort(403, 'Anda tidak terdaftar pada mata kuliah ini.');
            // }
            // checkPermission($matkul->id, $enroll_id->matkul_id);
            return view('frontend/pages/mahasiswa/pertemuan/mahasiswa-pertemuan', compact('pertemuans', 'matkul', 'enroll_id', 'lastPertemuan'));
        }
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
            'deskripsi' => 'required|min:100',
            'gambar' => 'required|file',
            'semester_id' => 'required',
            'hari' => 'required',
            'jam' => 'required',
            'prodi' => 'required',
            'kode_matkul' => 'unique:matkuls,kode_matkul',
        ]);

        $nama_matkul = $request->input('nama_matkul');
        $jam = $request->input('jam');
        $deskripsi = $request->input('deskripsi');
        $semester_id = $request->input('semester_id');
        $hari = $request->input('hari');
        $prodi_id = $request->input('prodi');
        $kode_mk = $request->input('kode_matkul');

        $gambar = $request->file('gambar'); // Use file() instead of input()

        // Convert the image to WebP format
        $webpImage = Image::make($gambar)->encode('webp', 90); // Adjust quality as needed
        $webpPath = 'public/thumbnail/' . time() . '.webp';
        // Save the WebP image to storage
        Storage::put($webpPath, $webpImage->stream());


        $userId = Auth::user()->dosen->id;

        $matkul = new Matkul;
        $matkul->nama_matkul = $nama_matkul;
        $matkul->dosen_id = $userId;
        $matkul->deskripsi = $deskripsi;
        $matkul->gambar = $webpPath;
        $matkul->jam = $jam;
        $matkul->semester_id = $semester_id;
        $matkul->prodi_id = $prodi_id;
        $matkul->hari = $hari;

        $matkul->kode_matkul = $kode_mk;
        $matkul->save();

        Session::flash('success');

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
    public function edit($id)
    {
        // Find the Matkul model by ID
        $matkul = Matkul::with('semester', 'prodi')->findOrFail($id);

        checkPermission($matkul->dosen_id, Auth::user()->dosen->id);
        return view('frontend.pages.dosen.matkul.edit-matkul', compact('matkul'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $matkul = Matkul::findOrFail($id);

        // Check permission before updating
        checkPermission($matkul->dosen_id, Auth::user()->dosen->id);

        $request->validate([
            'nama_matkul' => 'required',
            'video_url' => 'required',
            'deskripsi' => 'required|min:100',
            'gambar' => 'file', // You can update the file or leave it as is
            'semester_id' => 'required',
            'hari' => 'required',
            'prodi' => 'required',
        ]);

        $matkul->nama_matkul = $request->input('nama_matkul');
        $matkul->video_url = extractVideo($request->input('video_url'));
        $matkul->deskripsi = $request->input('deskripsi');
        $matkul->semester_id = $request->input('semester_id');
        $matkul->hari = $request->input('hari');
        $matkul->prodi_id = $request->input('prodi');
        $matkul->kode_matkul = $request->input('kode_matkul');

        // If a new image file is uploaded, update the image
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $webpImage = Image::make($gambar)->encode('webp', 90);
            $webpPath = 'public/thumbnail/' . time() . '.webp';
            Storage::put($webpPath, $webpImage->stream());
            $matkul->gambar = $webpPath;
        }

        $matkul->save();

        Session::flash('success');

        return redirect('/matkul');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
