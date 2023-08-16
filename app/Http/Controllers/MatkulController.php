<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Matkul;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;
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

        // Convert the image to WebP format
        $webpImage = Image::make($gambar)->encode('webp', 90); // Adjust quality as needed
        $webpPath = 'public/thumbnail/' . time() . '.webp';
        // Save the WebP image to storage
        Storage::put($webpPath, $webpImage->stream());


        $userId = Auth::user()->dosen->id;
        $videoId = extractVideo($video_url);

        $matkul = new Matkul;
        $matkul->nama_matkul = $nama_matkul;
        $matkul->dosen_id = $userId;
        $matkul->video_url = $videoId;
        $matkul->deskripsi = $deskripsi;
        $matkul->gambar = $webpPath;

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
