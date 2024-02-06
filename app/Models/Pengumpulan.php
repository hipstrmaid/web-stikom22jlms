<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengumpulan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    public function pengumpulan_files()
    {
        return $this->hasMany(Pengumpulan_file::class);
    }
}
