<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Jalankan seeder.
     */
    public function run(): void
    {
        // Admin default
        User::updateOrCreate(
            ['email' => 'endraadmin@gmail.com'],
            [
                'name' => 'endraadmin',
                'password' => Hash::make('endraadmin123'),
                'role' => 'admin',
            ]
        );

        // Peserta dummy
        User::updateOrCreate(
            ['email' => 'endra@gmail.com'],
            [
                'name' => 'endra',
                'password' => Hash::make('endra123'),
                'role' => 'peserta',
            ]
        );
    }
}
