<?php

namespace App\Http\Controllers;

use App\Models\Enroll;
use App\Models\Matkul;
use App\Models\Pertemuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnrollController extends Controller
{
    public function index()
    {
        $mahasiswa_semester = Auth::user()->mahasiswa->semester_id;

        $matkuls = Matkul::all()->where('semester_id', $mahasiswa_semester)->groupBy('semester_id')->sortBy(function ($items, $key) {
            return $key;
        });


        return view('frontend.pages.enroll', compact('matkuls'));
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'kode_matkul' => 'required'
        ]);

        $matkul_id = Matkul::where('id', $id)->first();
        $kode_matkul = $request->input('kode_matkul');
        if ($kode_matkul == $matkul_id->kode_matkul) {
            $id_mhs = Auth::user()->mahasiswa->id;
            $enroll = new Enroll;
            $enroll->mahasiswa_id = $id_mhs;
            $enroll->matkul_id = $matkul_id->id;
            $enroll->kode_matkul = $kode_matkul;
            $enroll->save();

            // $pertemuan = Pertemuan::findOrFail($id); // Assuming Resource is your model
            return redirect()->back()->with('success', 'Berhasil daftar mata kuliah');
        } else {
            return redirect()->back()->with('error', 'Kode yang anda masukkan salah');
        }
    }
}
