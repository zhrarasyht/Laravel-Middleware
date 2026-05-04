<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin'
        ]);

        // User biasa
        User::create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => Hash::make('1234'),
            'role' => 'user'
        ]);
    }
}
