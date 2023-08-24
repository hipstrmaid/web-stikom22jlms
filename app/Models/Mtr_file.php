<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mtr_file extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_file',
        'pertemuan_id',
        'deskripsi',
        'path_file',
        'extensi',
    ];

    function pertemuan()
    {
        $this->belongsTo(Pertemuan::class);
    }
}
