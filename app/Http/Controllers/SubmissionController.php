<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\Tugas;
use App\Models\Enroll;
use App\Models\Matkul;
use App\Helpers\Helper;
use App\Models\Mahasiswa;
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
        $tugass = Tugas::ShowTugas($id);
        $data = [
            'tugas' => Pengumpulan::where('tugas_id', $id)->get(),
            'tugass' => $tugass,
            'dueDate' => $tugass->tgl_tenggat . ' ' . $tugass->waktu_tenggat,
            'startDate' => $tugass->created_at,
            'enrolled' => Enroll::Enrolled($tugass->pertemuan_id),
            'submitted' => Pengumpulan::where('tugas_id', $tugass->id)->count(),
        ];

        return view('frontend/pages/dosen/tugas/pengumpulan-page', $data);
    }

    public function nilaiExcel($id)
    {
        // $tugas = Pengumpulan::where('tugas_id', $id)->get();
        $tugass = Tugas::ShowTugas($id);
        $data = [
            'tugass' => Tugas::ShowTugas($id),
            'matkul' => Matkul::where('id', $tugass->pertemuan->matkul_id)->first(),
            'tugas' => Nilai::whereHas('pengumpulan', function ($query) use ($id) {
                $query->where('tugas_id', $id);
            })->get(),
            'peserta' => Mahasiswa::whereHas('enroll')->with('enroll', 'enroll.pengumpulan.nilai')->get()
        ];
        return view('frontend/pages/dosen/tugas/export-page', $data);
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
            'file' => 'required|mimes:pdf,doc,docx,zip,rar,png,jpg,jpeg,mp3,wav,xlsx,html,sql|max:2048',
            'idTugas' => 'required'
        ]);

        $idTugas = $request->idTugas;

        $pengumpulan = Pengumpulan::Kumpulandcheck($idTugas);

        $webpPath = Helper::uploadTugas($request, 'file');

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
        $pid = Pengumpulan::where('tugas_id', $tugasID)->first();
        $countdown = Tugas::ShowCountdown($tugas);
        $tgl = $tugas->tgl_tenggat;
        $waktu = $tugas->waktu_tenggat;
        $startDate = $tugas->created_at;
        $dueDate = $tgl .= ' ' . $waktu;
        if ($pid) {
            $pengumpulan_id = $pid->id;
            $tgs_file = Pengumpulan_file::where('pengumpulan_id', $pengumpulan_id)->first();
            return view('frontend/pages/mahasiswa/tugas/submit-page', compact('idTugas', 'tgs_file', 'enrolled', 'submitted', 'countdown', 'startDate', 'dueDate'));
        }
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
