<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\Tugas;
use App\Models\Matkul;
use App\Models\Mahasiswa;
use App\Exports\NilaiExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportsController extends Controller
{
    public function export($id)
    {
        $tugass = Tugas::ShowTugas($id);
        $filename = str_replace(' ', '_', $tugass->pertemuan->judul_pertemuan) . ".xlsx";
        $namafile = "Nilai_" . strtolower($filename);
        return Excel::download(new NilaiExport($id), $namafile);
    }
}
