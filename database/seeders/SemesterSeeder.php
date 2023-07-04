<?php

namespace Database\Seeders;

use App\Models\Semester;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SemesterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $semester = [
            ['nama_semester' => 'Semester 1', 'created_at' => now()],
            ['nama_semester' => 'Semester 2', 'created_at' => now()],
            ['nama_semester' => 'Semester 3', 'created_at' => now()],
            ['nama_semester' => 'Semester 4', 'created_at' => now()],
            ['nama_semester' => 'Semester 5', 'created_at' => now()],
            ['nama_semester' => 'Semester 6', 'created_at' => now()],
            ['nama_semester' => 'Semester 7', 'created_at' => now()],
            ['nama_semester' => 'Semester 8', 'created_at' => now()],
        ];

        Semester::insert($semester);
    }
}
