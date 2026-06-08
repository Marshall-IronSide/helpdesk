<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        // Crée l'admin seulement s'il n'existe pas déjà
        User::firstOrCreate(
            ['email' => 'admin@helpdesk.com'],
            [
                'name'     => 'Admin',
                'password' => Hash::make('admin123'),
                'role'     => 'admin',
            ]
        );
    }
}