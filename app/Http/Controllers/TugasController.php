<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Tugas;
use App\Models\Enroll;
use App\Models\Pengumpulan;
use App\Models\Pertemuan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $allowedExtensions = ['jpg', 'png', 'gif', 'webp', 'mp4', 'avi', 'mov', 'mkv', 'mp3', 'wav', 'ogg', 'flac', 'aac', 'pdf', 'ppt', 'docx', 'doc'];
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
        $tgl = $tugas->tgl_tenggat;
        $waktu = $tugas->waktu_tenggat;
        $startDate = $tugas->created_at;
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
        }

        return view('frontend/pages/tugas-page', compact('tugas', 'mengumpul', 'enrolled', 'countdown', 'pertemuanId', 'matkulId', 'startDate', 'dueDate', 'submitted'));
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
