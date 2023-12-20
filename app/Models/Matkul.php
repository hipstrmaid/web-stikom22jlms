<?php

namespace App\Models;

use App\Models\Dosen;
use App\Models\Semester;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Matkul extends Model
{
    use HasFactory;
    const EXCERPT_LENGTH = 70;

    protected $guarded = ['id'];

    public function excerpt()
    {
        return Str::limit($this->deskripsi, Matkul::EXCERPT_LENGTH);
    }

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'dosen_id');
    }

    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class, 'semester_id');
    }

    public function pertemuan()
    {
        return $this->hasMany(Pertemuan::class);
    }

    public function enroll()
    {
        return $this->hasMany(Enroll::class);
    }

    public static function CreateMatkul($request)
    {

        $request->validate([
            'nama_matkul' => 'required',
            'deskripsi' => 'required|min:10',
            'gambar' => 'required|file',
            'semester_id' => 'required',
            'hari' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'prodi' => 'required',
            'kode_matkul' => 'unique:matkuls,kode_enroll',
        ]);

        $gambar = $request->file('gambar'); // Use file() instead of input()
        // Convert the image to WebP format
        $webpImage = Image::make($gambar)->encode('webp', 90); // Adjust quality as needed
        $webpPath = 'public/thumbnail/' . time() . '.webp';
        // Save the WebP image to storage

        $matkul = Matkul::create([
            'nama_matkul' => $request->input('nama_matkul'),
            'dosen_id' => Auth::user()->dosen->id,
            'deskripsi' => $request->input('deskripsi'),
            'gambar' => $webpPath,
            'jam_mulai' => $request->input('jam_mulai'),
            'jam_selesai' => $request->input('jam_selesai'),
            'semester_id' => $request->input('semester_id'),
            'prodi_id' => $request->input('prodi'),
            'hari' => $request->input('hari'),
            'pemberitahuan' => $request->input('pemberitahuan'),
            'kode_enroll' => $request->input('kode_matkul'),
        ]);

        Storage::put($webpPath, $webpImage->stream());
        return $matkul;

        // No need to call $matkul->save() as create() handles it

    }


    public static function UpdateMatkul($request, $id)
    {

        $matkul = Matkul::findOrFail($id);
        $dosen_id = Auth::user()->dosen->id;

        $nama_matkul = $request->input('nama_matkul');
        $jam_mulai = $request->input('jam_mulai');
        $jam_selesai = $request->input('jam_selesai');
        $deskripsi = $request->input('deskripsi');
        $semester_id = $request->input('semester_id');
        $hari = $request->input('hari');
        $prodi_id = $request->input('prodi');
        $kode_mk = $request->input('kode_matkul');
        // If a new image file is uploaded, update the image
        if ($request->hasFile('gambar')) {

            $gambar = $request->file('gambar');
            $webpImage = Image::make($gambar)->encode('webp', 90);
            $webpPath = 'public/thumbnail/' . time() . '.webp';
            Storage::put($webpPath, $webpImage->stream());
            $matkul->gambar = $webpPath;
        }
        $matkul->nama_matkul = $nama_matkul;
        $matkul->jam_mulai = $jam_mulai;
        $matkul->jam_selesai = $jam_selesai;
        $matkul->dosen_id = $dosen_id;
        $matkul->deskripsi = $deskripsi;
        $matkul->semester_id = $semester_id;
        $matkul->hari = $hari;
        $matkul->prodi_id = $prodi_id;
        $matkul->kode_enroll = $kode_mk;


        return $matkul->save();
    }
}
