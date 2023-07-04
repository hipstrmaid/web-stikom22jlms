<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    public function matkul()
    {
        return $this->hasMany(Matkul::class, 'dosen_id');
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
