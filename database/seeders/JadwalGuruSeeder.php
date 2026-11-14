<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\JadwalGuru;


class JadwalGuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         JadwalGuru::create([
            'nama_guru'      => 'Lista, S.Kom.',
            'hari'           => 'Senin',
            'mata_pelajaran' => 'Pemrograman Web',
            'kelas'          => 'XII RPL',
            'jam_mulai'      => '07:00',
            'jam_selesai'    => '09:30',
        ]);
    }
}
