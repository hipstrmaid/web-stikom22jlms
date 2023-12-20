<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Enroll extends Model
{
    use HasFactory;
    protected $fillable = ['mahasiswa_id', 'matkul_id', 'kode_matkul'];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }

    public function matkul()
    {
        return $this->belongsTo(Matkul::class);
    }

    public static function Enrolled($pertemuan_id)
    {
        $pertemuan = Pertemuan::where('id', $pertemuan_id)->first();
        $matkul_id = $pertemuan->matkul_id;
        return Enroll::where('matkul_id', $matkul_id)->get();
    }
}
