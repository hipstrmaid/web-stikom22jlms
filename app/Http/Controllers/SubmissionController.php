<?php

namespace App\Http\Controllers;

use App\Models\Tugas;
use App\Models\Enroll;
use App\Models\Pengumpulan;
use Illuminate\Http\Request;
use App\Models\Pengumpulan_file;

class SubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function indexAll($id)
    {
        $tugas = Pengumpulan::where('tugas_id', $id)->get();
        $tugass = Tugas::ShowTugas($id);
        $tgl = $tugass->tgl_tenggat;
        $waktu = $tugass->waktu_tenggat;
        $startDate = $tugass->created_at;
        $dueDate = $tgl .= ' ' . $waktu;
        $tugasID = $tugass->id;
        $enrolled = Enroll::Enrolled($tugass->pertemuan_id);
        $submitted = Pengumpulan::where('tugas_id', $tugasID)->count();
        $countdown = Tugas::ShowCountdown($tugass);
        return view('frontend/pages/dosen/tugas/pengumpulan-page', compact('tugas', 'tugass', 'dueDate', 'enrolled', 'submitted', 'startDate'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:pdf,doc,docx,zip,rar,png,jpg,jpeg,mp3,wav|max:2048',
            'idTugas' => 'required'
        ]);

        $idTugas = $request->idTugas;

        $pengumpulan = Pengumpulan::Kumpulandcheck($idTugas);

        $webpPath = uploadTugas($request, 'file');

        Pengumpulan_file::InsertPathandCheck($pengumpulan, $webpPath, $idTugas);

        return redirect()->route('tugas.show', ['tuga' => $idTugas])->with('success', 'Berhasil mengumpul tugas!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tugas = Tugas::ShowTugas($id);
        $idTugas = $id;
        $tugasID = $tugas->id;
        $enrolled = Enroll::Enrolled($tugas->pertemuan_id);
        $submitted = Pengumpulan::where('tugas_id', $tugasID)->count();
        $countdown = Tugas::ShowCountdown($tugas);
        $tgl = $tugas->tgl_tenggat;
        $waktu = $tugas->waktu_tenggat;
        $startDate = $tugas->created_at;
        $dueDate = $tgl .= ' ' . $waktu;
        return view('frontend/pages/mahasiswa/tugas/submit-page', compact('idTugas', 'enrolled', 'submitted', 'countdown', 'startDate', 'dueDate'));
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
