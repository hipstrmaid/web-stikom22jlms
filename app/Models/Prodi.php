<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    use HasFactory;

    protected $guard = 'id';

    protected $fillable = [
        'nama_prodi',
        // other fillable attributes
    ];


    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class);
    }

    public function matkul()
    {
        return $this->hasMany(Matkul::class);
    }
}
