<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enroll extends Model
{
    use HasFactory;
    protected $fillable = ['mhs_id', 'matkul_id', 'kode_matkul'];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }

    public function matkul()
    {
        return $this->belongsTo(Matkul::class);
    }
}
