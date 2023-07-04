<?php

namespace App\Models;

use App\Models\Dosen;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Matkul extends Model
{
    use HasFactory;

    protected $fillable = [
        'dosen_id',
        'semester_id',
        'nama_matkul',
        'video_url',
        'deskripsi',
        'gambar',
        'hari',
    ];


    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'dosen_id');
    }

    public function semester()
    {
        return $this->hasOne(Semester::class, 'id', 'semester_id');
    }
}
