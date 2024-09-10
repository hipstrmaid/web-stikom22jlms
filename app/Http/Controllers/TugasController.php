<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Nilai;
use App\Models\Tugas;
use App\Models\Enroll;
use App\Models\Matkul;
use App\Models\Pertemuan;
use App\Models\Pengumpulan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->role->nama_role == "Mahasiswa") {
            // Get the ID of the logged-in Mahasiswa
            $mahasiswaId = Auth::user()->mahasiswa->id;
            $tugas = Tugas::getTugasForMahasiswa($mahasiswaId);
        } else {
            $dosenId = Auth::user()->dosen->id;
            $tugas = Tugas::getTugasForDosen($dosenId);
        }

        return view('frontend.pages.tugas-list', compact('tugas'));
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
        $request->validate([
            'file' => 'required|file'
        ]);

        $file = $request->file("file");
        $OGextension = $file->getClientOriginalExtension();
        $extension = Str::lower($OGextension);

        // Define the allowed extensions
        $allowedExtensions = ['jpg', 'png', 'gif', 'webp', 'mp4', 'avi', 'mov', 'mkv', 'mp3', 'wav', 'ogg', 'flac', 'aac', 'pdf', 'ppt', 'docx', 'doc', 'xlsx'];
        // Check if the extension is in the allowed list
        if (!in_array($extension, $allowedExtensions)) {
            session()->flash('error', 'Format file tidak valid.');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = Auth::user();
        $tugas = Tugas::ShowTugas($id);
        $tugasID = $tugas->id;
        $enrolled = Enroll::Enrolled($tugas->pertemuan_id);
        $countdown = Tugas::ShowCountdown($tugas);
        $submitted = Pengumpulan::where('tugas_id', $tugasID)->count();
        $waktu = $tugas->waktu_tenggat;
        $tgl = $tugas->tgl_tenggat;
        $startDate = Carbon::parse($tugas->created_at)->translatedFormat('l, d-m-Y');
        $batas = Carbon::parse($tugas->tgl_tenggat)->translatedFormat('l, d-m-Y');
        $dueDate = $tgl .= ' ' . $waktu;
        $pertemuanId = $tugas->pertemuan_id;
        if ($user->role_id === 1) {
            $matkulId = $enrolled->first()->matkul_id;
        } elseif ($user->role_id === 2) {
            $matkulId = $pertemuanId;
        }

        $mengumpul = false;

        if ($user->mahasiswa) {
            $mengumpul = Pengumpulan::where('tugas_id', $tugasID)->where('mahasiswa_id', $user->mahasiswa->id)->exists();
            $mahasiswa = $user->mahasiswa->id;
            $nilais = Pengumpulan::where('mahasiswa_id', $mahasiswa)->first();
            return view('frontend/pages/tugas-page', compact('batas', 'nilais', 'tugas', 'mengumpul', 'enrolled', 'countdown', 'pertemuanId', 'matkulId', 'startDate', 'dueDate', 'submitted'));
        }

        return view('frontend/pages/tugas-page', compact('batas', 'tugas', 'mengumpul', 'enrolled', 'countdown', 'pertemuanId', 'matkulId', 'startDate', 'dueDate', 'submitted'));
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
