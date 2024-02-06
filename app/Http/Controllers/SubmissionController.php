<?php

namespace App\Http\Controllers;

use App\Models\Tugas;
use App\Models\Enroll;
use App\Models\Pengumpulan;
use Illuminate\Http\Request;
use App\Models\Pengumpulan_file;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SubmissionController extends Controller
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

        if (Auth::user()->role_id != 1) {
            return redirect()->back()->with('error', 'Anda bukan mahasiswa!');
        }

        // Check if a submission record already exists for the given assignment and user
        $pengumpulan = Pengumpulan::where('tugas_id', $idTugas)
            ->where('mahasiswa_id', Auth::user()->mahasiswa->id)
            ->first();

        if ($pengumpulan) {
            // Update the existing Pengumpulan record
            $pengumpulan->update([
                // Update any other fields as needed
            ]);
        } else {
            // Create a new Pengumpulan record
            $pengumpulan = Pengumpulan::create([
                'tugas_id' => $idTugas,
                'mahasiswa_id' => Auth::user()->mahasiswa->id,
                // Add any other fields as needed
            ]);
        }

        $webpPath = uploadTugas($request, 'file');

        // Check if a PengumpulanFile record already exists for the given Pengumpulan
        $pengumpulanFile = Pengumpulan_file::where('pengumpulan_id', $pengumpulan->id)->first();

        if ($pengumpulanFile) {
            // Update the existing PengumpulanFile record
            $oldPath = $pengumpulanFile->path_file;
            deleteTugasFile($oldPath);
            $pengumpulanFile->update([
                'path_file' => $webpPath,
                // Update any other fields as needed
            ]);
            return redirect()->route('tugas.show', ['tuga' => $idTugas])->with('success', 'Berhasil mengedit tugas!');
        } else {
            // Create a new PengumpulanFile record
            Pengumpulan_file::create([
                'pengumpulan_id' => $pengumpulan->id,
                'path_file' => $webpPath,
                // Add any other fields as needed
            ]);
        }

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
