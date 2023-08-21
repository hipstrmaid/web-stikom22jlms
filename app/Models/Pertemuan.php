<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pertemuan extends Model
{
    use HasFactory;

    protected $fillable = [
        'matkul_id',
        'nama_pertemuan',
    ];

    function matkul()
    {
        $this->belongsTo(Matkul::class, 'matkul_id');
    }

    public function mtr_video()
    {
        return $this->hasMany(Mtr_video::class);
    }
}
