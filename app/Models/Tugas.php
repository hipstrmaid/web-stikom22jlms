<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tugas extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    function pertemuan()
    {
        return $this->belongsTo(Pertemuan::class);
    }

    public function tgs_file()
    {
        return $this->hasMany(Tgs_file::class);
    }

    function pengumpulan()
    {
        return $this->hasMany(Pengumpulan::class);
    }


    function CreateTugas($request, $id)
    {
        $request->validate([
            'Judul_tugas' => 'required',
            'Instruksi' => 'required|min:5',
            'Deskripsi' => 'required|min:5',
            'Batas_tanggal' => 'required',
            'Jam' => 'required',
            'Menit' => 'required',
        ]);

        $jam = $request->input('Jam');
        $menit = $request->input('Menit');
        $waktu = $jam . ':' . $menit;

        $data = [
            'pertemuan_id' => $id,
            'judul_tugas' => $request->input('Judul_tugas'),
            'instruksi' => $request->input('Instruksi'),
            'deskripsi' => $request->input('Deskripsi'),
            'tgl_tenggat' => $request->input('Batas_tanggal'),
            'waktu_tenggat' => $waktu

        ];

        return Tugas::create($data);
    }

    public static function ShowTugas($id)
    {
        return Tugas::with('tgs_file')->find($id);
    }

    public static function ShowCountdown($tugasId)
    {
        $tanggal = $tugasId->tgl_tenggat;
        $waktu = $tugasId->waktu_tenggat;
        // Calculate the countdown
        $targetDateTime = Carbon::parse($tanggal . ' ' . $waktu);
        $currentDateTime = Carbon::now();
        $countdown = $targetDateTime->diff($currentDateTime);
        return $countdown->format('%a Hari, %h Jam, %i Menit');
    }

    public static function getTugasForDosen($dosenId)
    {

        return Tugas::join('pertemuans', 'tugas.pertemuan_id', '=', 'pertemuans.id')
            ->join('matkuls', 'pertemuans.matkul_id', '=', 'matkuls.id')
            ->where('matkuls.dosen_id', $dosenId)
            ->select('tugas.*')
            ->distinct()
            ->get();
    }

    public static function getTugasForMahasiswa($mahasiswaId)
    {

        return Tugas::join('pertemuans', 'tugas.pertemuan_id', '=', 'pertemuans.id')
            ->join('matkuls', 'pertemuans.matkul_id', '=', 'matkuls.id')
            ->leftJoin('enrolls', 'matkuls.id', '=', 'enrolls.matkul_id')
            ->where('enrolls.mahasiswa_id', $mahasiswaId)
            ->select('tugas.*')
            ->distinct()
            ->get();
    }

    public static function uploadFile($request, $file_path)
    {
        $file = $request->file($file_path);
        $OGextension = $file->getClientOriginalExtension();
        $extension = Str::lower($OGextension);
        $path_file = 'public/files/' . time() . '.' . $extension;
        if ($file) {
            Storage::put($path_file, $file->get());
        }

        return $path_file;
    }
}
