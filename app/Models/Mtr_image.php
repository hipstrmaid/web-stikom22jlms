<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mtr_image extends Model
{
    use HasFactory;


    protected $guarded = ['id'];

    function pertemuan()
    {
        $this->belongsTo(Pertemuan::class);
    }

    public static function storeImage($extension)
    {
        return 'public/images/' . time() . '.' . $extension;
    }
}
