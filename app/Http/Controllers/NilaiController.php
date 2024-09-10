<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\Tugas;
use App\Models\Pengumpulan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NilaiController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $id)
    {
        $request->validate([
            'nilai' => 'required'
        ]);

        $nilai = $request->input('nilai');

        // Check if a record with the given 'pengumpulan_id' already exists in the 'nilai' table
        $existingNilai = Nilai::where('pengumpulan_id', $id)->first();

        if ($existingNilai) {
            // If a record exists, update the 'nilai' value
            $existingNilai->update(['nilai' => $nilai]);
        } else {
            // If no record exists, create a new one
            $data = [
                'pengumpulan_id' => $id,
                'nilai' => $nilai
            ];
            Nilai::create($data);
        }

        // Retrieve the associated pengumpulan to get the tugas_id
        $pengumpulan = Pengumpulan::findOrFail($id);
        $idTugas = $pengumpulan->tugas_id;

        return redirect(route('submission.indexAll', ['id' => $idTugas]));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $pengumpulan = Pengumpulan::findOrFail($id);
        $file = $pengumpulan->pengumpulan_files->first();
        $id_tugas = $pengumpulan->tugas_id;
        $tugas = Tugas::ShowTugas($id_tugas);
        $tgl = $tugas->tgl_tenggat;
        $waktu = $tugas->waktu_tenggat;
        $startDate = $tugas->created_at;
        $dueDate = $tgl .= ' ' . $waktu;
        return view('frontend.pages.dosen.nilai.grading-page', compact('pengumpulan', 'file', 'dueDate'));
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
}
