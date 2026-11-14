<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProfilGuru;

class ProfilGuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProfilGuru::create([
            'nama_guru' => 'Kalinna',
            'nip' => '98756436',
            'bidang_studi' => 'Bahasa Inggris',
            'no_telepon' => '0754328',
        ]);
    }

}
