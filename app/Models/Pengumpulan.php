<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengumpulan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    public function pengumpulan_files()
    {
        return $this->hasMany(Pengumpulan_file::class);
    }


    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id');
    }

    public function tugas()
    {
        return $this->belongsTo(Tugas::class, 'tugas_id');
    }

    public static function Kumpulandcheck($id)
    {

        $idTugas = $id;

        if (Auth::user()->role_id != 1) {
            return redirect()->back()->with('error', 'Anda bukan mahasiswa!');
        }

        // Check if a submission record already exists for the given assignment and user
        $pengumpulan = Pengumpulan::where('tugas_id', $idTugas)
            ->where('mahasiswa_id', Auth::user()->mahasiswa->id)
            ->first();

        if ($pengumpulan) {
            // Update the existing Pengumpulan record
            $pengumpulan->update([
                'updated_at' => now()
            ]);
        } else {
            // Create a new Pengumpulan record
            $pengumpulan = Pengumpulan::create([
                'tugas_id' => $idTugas,
                'mahasiswa_id' => Auth::user()->mahasiswa->id,
                // Add any other fields as needed
            ]);
        }

        return $pengumpulan;
    }
}
