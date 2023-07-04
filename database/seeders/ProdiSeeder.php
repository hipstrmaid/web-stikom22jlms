<?php

namespace Database\Seeders;

use App\Models\Prodi;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $prodi = [
            ['nama_prodi' => 'Sistem Informasi', 'created_at' => now()],
            ['nama_prodi' => 'Teknik Computer', 'created_at' => now()],
            // Add more role records as needed
        ];

        Prodi::insert($prodi);
    }
}