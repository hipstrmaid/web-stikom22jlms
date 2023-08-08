<?php

namespace App\Models;

use App\Models\Dosen;
use App\Models\Semester;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;

class Matkul extends Model
{
    use HasFactory;
    const EXCERPT_LENGTH = 80;

    protected $fillable = [
        'dosen_id',
        'semester_id',
        'nama_matkul',
        'video_url',
        'deskripsi',
        'gambar',
        'hari',
    ];

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
        return $this->belongsTo(Prodi::class, 'prodi_id');
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class, 'semester_id');
    }


    // public function semester()
    // {
    //     return $this->hasMany(Semester::class, 'id', 'semester_id');
    // }
}
