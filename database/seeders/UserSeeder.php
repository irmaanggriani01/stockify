<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // Pastikan model User diimpor
use Illuminate\Support\Facades\Hash; // Untuk hashing password

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Data pengguna dummy
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('123456'), // Hashing password
                'role' => 'Admin',
            ],
            [
                'name' => 'Staff Gudang',
                'email' => 'staffgudang@gmail.com',
                'password' => Hash::make('123456'),
                'role' => 'Staff Gudang',
            ],
            [
                'name' => 'Manajer Gudang',
                'email' => 'manajergudang@gmail.com',
                'password' => Hash::make('123456'),
                'role' => 'Manajer Gudang',
            ],
        ];

        // Loop untuk membuat setiap pengguna
        foreach ($users as $user) { 
            User::create($user); // Menambahkan ke tabel users
        }
    }
}
