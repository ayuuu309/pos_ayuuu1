<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // ADMIN
        User::create([
            'name' => 'Ayu Nurul Huda',
            'email' => 'ayu@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 1,
        ]);

        // KASIR
        User::create([
            'name' => 'Rizky Ramadhan',
            'email' => 'rizky@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 2,
        ]);

        User::create([
            'name' => 'Siti Nurhaliza',
            'email' => 'siti@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 2,
        ]);

        User::create([
            'name' => 'Dimas Pratama',
            'email' => 'dimas@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 2,
        ]);

        User::create([
            'name' => 'Nabila Putri',
            'email' => 'nabila@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 2,
        ]);

        User::create([
            'name' => 'Fajar Maulana',
            'email' => 'fajar@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 2,
        ]);
    }
}