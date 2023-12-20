<?php

namespace App\Http\Controllers;


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
            $matkuls = Enroll::where('mahasiswa_id', $mahasiswa_id)->with('matkul.dosen')->get();
            return view('frontend.pages.matkul', ['matkuls' => $matkuls]);
        }
    }

    public function pertemuanPreview($id)
    {
        //Ambil 1 record yang punya id di $id
        $matkul = Matkul::with('semester', 'prodi')->findOrFail($id);
        $pertemuans = Pertemuan::where('matkul_id', $id)->get();
        $lastPertemuan = Pertemuan::where('matkul_id', $id)->latest()->first();
        $totalUser = Enroll::where('matkul_id', $matkul->id)->get();

        if (Auth::user()->dosen) {
            checkPermission($matkul->dosen_id, Auth::user()->dosen->id);
            return view('frontend/pages/dosen/pertemuan/dosen-pertemuan', compact('pertemuans', 'matkul', 'lastPertemuan', 'totalUser'));
        } elseif (Auth::user()->mahasiswa) {

            $enroll_id = Matkul::where('id', $id)->first();
            $mahasiswa = Auth::user()->mahasiswa;
            $sudahEnroll = $mahasiswa->enroll()->where('matkul_id', $enroll_id->id)->exists();

            if (!$sudahEnroll) {
                abort(403, 'Tidak terdaftar pada mata kuliah ini');
            }

            return view('frontend/pages/mahasiswa/pertemuan/mahasiswa-pertemuan', compact('pertemuans', 'matkul', 'enroll_id', 'lastPertemuan', 'sudahEnroll', 'totalUser'));
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
        Matkul::CreateMatkul($request);
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

        if (!$matkul) {
            abort('403', 'Anda bukan dosen');
        }
        checkPermission($matkul->dosen_id, Auth::user()->dosen->id);
        return view('frontend.pages.dosen.matkul.edit-matkul', compact('matkul'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        Matkul::UpdateMatkul($request, $id);
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
