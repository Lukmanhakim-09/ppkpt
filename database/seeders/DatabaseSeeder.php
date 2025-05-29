<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'username' => 'admin',
            'password' => 'admin',
            'role' => 'Admin',
            'fullname' => 'Admin',
            'profile' => 'user.webp',
            'status_verify' => null, 
            'email' => null,
            'nim_nidn' => null,
            'status' => null,
        ]);

        User::factory()->create([
            'username' => '221031066',
            'password' => '221031066',
            'role' => 'Pelapor',
            'fullname' => 'Andi Riah Zahirah',
            'profile' => 'user.webp',
            'status_verify' => '1', 
            'email' => 'andiriahzahirah.221031066@mahasiswa.ith.ac.id',
            'nim_nidn' => '221031066',
            'status' => 'Mahasiswa',
        ]);

        User::factory()->create([
            'username' => '221031003',
            'password' => '221031003',
            'role' => 'Pelapor',
            'fullname' => 'Muhammad Akbar',
            'profile' => 'user.webp',
            'status_verify' => '1', 
            'email' => 'muhammadakbar.221031003@mahasiswa.ith.ac.id',
            'nim_nidn' => '221031003',
            'status' => 'Mahasiswa',
        ]);

        User::factory()->create([
            'username' => '221031018',
            'password' => '221031018',
            'role' => 'Pelapor',
            'fullname' => 'Lukman Hakim',
            'profile' => 'user.webp',
            'status_verify' => '1', 
            'email' => 'lukmanhakim.221031018@mahasiswa.ith.ac.id',
            'nim_nidn' => '221031018',
            'status' => 'Mahasiswa',
        ]);
        
    }
}
