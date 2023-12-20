<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pertemuan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    function matkul()
    {
        $this->belongsTo(Matkul::class);
    }

    public function mtr_video()
    {
        return $this->hasMany(Mtr_video::class);
    }

    public function mtr_file()
    {
        return $this->hasMany(Mtr_file::class);
    }

    public function mtr_image()
    {
        return $this->hasMany(Mtr_image::class);
    }

    public function tugas()
    {
        return $this->hasMany(Tugas::class);
    }
}
