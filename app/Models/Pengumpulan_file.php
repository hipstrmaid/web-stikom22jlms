<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengumpulan_file extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function pengumpulan()
    {
        return $this->belongsTo(Pengumpulan::class);
    }
}
