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

    public static function InsertPathandCheck($pengumpulan, $webpPath, $idTugas)
    {
        // Check if a PengumpulanFile record already exists for the given Pengumpulan
        $pengumpulanFile = Pengumpulan_file::where('pengumpulan_id', $pengumpulan->id)->first();

        if ($pengumpulanFile) {
            // Update the existing PengumpulanFile record
            $oldPath = $pengumpulanFile->path_file;
            deleteTugasFile($oldPath);
            $pengumpulanFile->update([
                'path_file' => $webpPath,
                // Update any other fields as needed
            ]);
            return redirect()->route('tugas.show', ['tuga' => $idTugas])->with('success', 'Berhasil mengedit tugas!');
        } else {
            // Create a new PengumpulanFile record
            Pengumpulan_file::create([
                'pengumpulan_id' => $pengumpulan->id,
                'path_file' => $webpPath,
                // Add any other fields as needed
            ]);
        }
    }
}
