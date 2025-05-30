<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $user = User::create([
            'username' => 'admin',
            'password' => 'admin',
            'role' => 'admin',
            'fullname' => 'Admin',
            'profile' => 'user.webp',
            'status_verify' => null, 
            'email' => null,
            'nim_nidn' => null,
            'status' => null,
            'remember_token' => Str::random(10),
        ]);

        $user = User::create([
            'username' => '221031066',
            'password' => '221031066',
            'role' => 'pelapor',
            'fullname' => 'Andi Riah Zahirah',
            'profile' => 'user.webp',
            'status_verify' => '1', 
            'email' => 'andiriahzahirah.221031066@mahasiswa.ith.ac.id',
            'nim_nidn' => '221031066',
            'status' => 'Mahasiswa',
            'remember_token' => Str::random(10),
        ]);

        $user = User::create([
            'username' => '221031003',
            'password' => '221031003',
            'role' => 'pelapor',
            'fullname' => 'Muhammad Akbar',
            'profile' => 'user.webp',
            'status_verify' => '1', 
            'email' => 'muhammadakbar.221031003@mahasiswa.ith.ac.id',
            'nim_nidn' => '221031003',
            'status' => 'Mahasiswa',
            'remember_token' => Str::random(10),
        ]);

        $user = User::create([
            'username' => '221031018',
            'password' => '221031018',
            'role' => 'pelapor',    
            'fullname' => 'Lukman Hakim',
            'profile' => 'user.webp',
            'status_verify' => '1', 
            'email' => 'lukmanhakim.221031018@mahasiswa.ith.ac.id',
            'nim_nidn' => '221031018',
            'status' => 'Mahasiswa',
            'remember_token' => Str::random(10),
        ]);
        
    }
}
