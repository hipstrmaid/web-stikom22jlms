<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function matkul()
    {
        return $this->belongsTo(Matkul::class);
    }

    public function topic()
    {
        return $this->hasMany(Topic::class);
    }
}
