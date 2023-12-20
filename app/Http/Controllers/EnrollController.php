<?php

namespace App\Http\Controllers;

use App\Models\Enroll;
use App\Models\Matkul;
use App\Models\Pertemuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnrollController extends Controller
{
    // public function index()
    // {
    //     $mahasiswa_semester = Auth::user()->mahasiswa->semester_id;

    //     $matkuls = Matkul::all()->where('semester_id', $mahasiswa_semester)->groupBy('semester_id')->sortBy(function ($items, $key) {
    //         return $key;
    //     });
    //     $matkulExist = Matkul::where('semester_id', $mahasiswa_semester)->exists();
    //     return view('frontend.pages.enroll', compact('matkuls', 'matkulExist'));
    // }


    public function index()
    {
        // Get the current user's semester ID (assuming you have set up relationships correctly).
        $mahasiswa_semester = Auth::user()->mahasiswa->semester_id;

        // Retrieve matkuls for the specified semester.
        $matkuls = Matkul::where('semester_id', $mahasiswa_semester)->get();

        // Check if any subjects (matkuls) exist for the specified semester.
        $matkulExist = $matkuls->isNotEmpty();


        return view('frontend.pages.enroll', compact('matkuls', 'matkulExist'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'kode_matkul' => 'required'
        ]);

        $kode_matkul = $request->input('kode_matkul');
        $matkul = Matkul::where('kode_enroll', $kode_matkul)->first();

        // Make sure to properly retrieve the user's Mahasiswa ID
        $mahasiswaId = Auth::user()->mahasiswa->id;

        $enrolled = Enroll::where('kode_matkul', $kode_matkul)->exists();

        if (!$matkul) {
            return redirect()->back()->with('error', 'Tidak ada mata kuliah dengan kode ini.');
        }

        if ($matkul && !$enrolled) {
            $enrolls = [
                "mahasiswa_id" => $mahasiswaId, // Set the Mahasiswa ID correctly
                "matkul_id" => $matkul->id,
                "kode_matkul" => $kode_matkul
            ];
            Enroll::create($enrolls);

            return redirect()->back()->with('success', $matkul->nama_matkul . ' berhasil di tambahkan.');
        }

        return redirect()->back()->with('error', 'Mata Kuliah sudah terdaftar.');
    }

    public function previewMatkul($id)
    {

        //Ambil 1 record yang punya id di $id
        $matkul = Matkul::with('semester', 'prodi')->findOrFail($id);
        $pertemuans = Pertemuan::where('matkul_id', $id)->get();
        $lastPertemuan = Pertemuan::where('matkul_id', $id)->latest()->first();

        $enroll_id = Matkul::where('id', $id)->first();
        $mahasiswa = Auth::user()->mahasiswa;
        $sudahEnroll = $mahasiswa->enroll()->where('matkul_id', $enroll_id->id)->exists();

        $totalUser = Enroll::where('matkul_id', $matkul->id)->get();

        return view('frontend/pages/mahasiswa/pertemuan/mahasiswa-pertemuan', compact('pertemuans', 'matkul', 'enroll_id', 'lastPertemuan', 'sudahEnroll', 'totalUser'));
    }
}
