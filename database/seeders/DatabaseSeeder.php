<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Buat 10 user secara acak
        User::factory(10)->create();

        // Tambahkan akun admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('123456'), // Sesuaikan password sesuai kebutuhan
            'role' => 'admin', // Set role sebagai admin
        ]);

        // Tambahkan akun user
        User::create([
            'name' => 'User',
            'email' => 'user@example.com',
            'password' => Hash::make('123456'), // Sesuaikan password sesuai kebutuhan
            'role' => 'user', // Set role sebagai user
        ]);

        // Contoh tambahan untuk akun lain jika diperlukan
        User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('password'), // Password untuk akun ini
            'role' => 'user', // Role bisa disesuaikan
        ]);
    }
}
