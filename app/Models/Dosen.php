<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;
    protected $fillable = ['nama', 'foto', 'user_id'];

    public function matkul()
    {
        return $this->hasMany(Matkul::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
