<?php

namespace App\Http\Controllers;

use App\Models\Enroll;
use App\Models\Matkul;
use App\Models\Pertemuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

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
            'Judul_pertemuan' => 'required',
            'video_url' => 'required',
            'deskripsi' => 'required',
            'instruksi' => 'required',
            'gambar' => 'required|file'
        ]);

        $gambar = $request->file('gambar'); // Use file() instead of input()
        $webpImage = Image::make($gambar)->encode('webp', 90); // Adjust quality as needed
        $gambar_path = 'public/files/' . time() . '.webp';
        // Save the WebP image to storage
        Storage::put($gambar_path, $webpImage->stream());

        $urlVideo = $request->input('video_url');


        $id = Auth::user()->dosen->id;
        $matkul_id = Matkul::where('dosen_id', $id)->firstOrFail();
        $pertemuan = new Pertemuan;
        $pertemuan->matkul_id = $matkul_id->id;
        $pertemuan->judul_pertemuan = $request->input('Judul_pertemuan');
        $pertemuan->deskripsi = $request->input('deskripsi');
        $pertemuan->video_url = extractVideo($urlVideo);
        $pertemuan->instruksi = $request->input('instruksi');
        $pertemuan->gambar = $gambar_path;

        $pertemuan->save();

        return redirect()->route('pertemuan.indexPertemuan', ['id' => $matkul_id->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pertemuan = Pertemuan::findOrFail($id); // Assuming Resource is your model
        $user = Auth::user();
        if ($user->dosen) {
            $dosen_matkul = Matkul::where('dosen_id', $user->dosen->id)->first();
            checkPermission($pertemuan->matkul_id, $dosen_matkul->id);
            return view('frontend.pages.mahasiswa.belajar.mahasiswa-belajar', compact('pertemuan'));
        } else {
            $mhs_matkul = Enroll::where('id', $user->mahasiswa->id)->first();
            checkPermission($pertemuan->matkul_id, $mhs_matkul->id);
            return view('frontend.pages.mahasiswa.belajar.mahasiswa-belajar', compact('pertemuan'));
        }
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
