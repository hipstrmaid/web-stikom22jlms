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
            ['nama_role' => 'Mahasiswa'],
            ['nama_role' => 'Dosen'],
            ['nama_role' => 'BAAK'],
            ['nama_role' => 'Admin'],
            // Add more role records as needed
        ];

        Role::insert($roles);
    }
}
