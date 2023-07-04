<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            ['nama_role' => 'Mahasiswa', 'created_at' => now()],
            ['nama_role' => 'Dosen', 'created_at' => now()],
            ['nama_role' => 'BAAK', 'created_at' => now()],
            ['nama_role' => 'Admin', 'created_at' => now()],
            // Add more role records as needed
        ];

        Role::insert($roles);
    }
}
