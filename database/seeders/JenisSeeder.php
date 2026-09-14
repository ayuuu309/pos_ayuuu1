<?php

namespace Database\Seeders;

use App\Models\Jenis;
use App\Models\User;
use Illuminate\Database\Seeder;

class JenisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil ID user pertama (biasanya Admin)
        $userId = User::first()?->id;

        $categories = ['Makanan', 'Minuman', 'Sembako', 'Elektronik', 'Pakaian'];

        foreach ($categories as $nama) {
            Jenis::create([
                'nama_jenis' => $nama,
                'user_id'    => $userId,
            ]);
        }
    }
}