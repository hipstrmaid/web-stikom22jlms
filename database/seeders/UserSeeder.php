<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $nim = '1920557016';
        $username = 'admin';

        User::create([
            // 'nim_mhs' => $nim,
            'username' => $username,
            'password' => Hash::make('admin123'),
            'role_id' => 4,
        ]);

        Admin::create([
            'nama' => null,
            'foto' => null,
            'nidn' => 1920557016,
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
