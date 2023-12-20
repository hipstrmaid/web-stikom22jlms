<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Tugas;
use App\Models\Enroll;
use App\Models\Pertemuan;
use Illuminate\Http\Request;

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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tugas = Tugas::ShowTugas($id);
        $enrolled = Enroll::Enrolled($tugas->pertemuan_id);
        $countdown = Tugas::ShowCountdown($tugas);
        $tgl = $tugas->tgl_tenggat;
        $waktu = $tugas->waktu_tenggat;
        $startDate = $tugas->created_at;
        $dueDate = $tgl .= ' ' . $waktu;
        $pertemuanId = $tugas->pertemuan_id;
        $matkulId = $enrolled->first()->matkul_id;

        return view('frontend/pages/tugas-page', compact('tugas', 'enrolled', 'countdown', 'pertemuanId', 'matkulId', 'startDate', 'dueDate'));
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
