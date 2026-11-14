<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Absensi;

class AbsensiSeeder extends Seeder
{
    public function run(): void
    {
        Absensi::create([
            'nama_siswa' => 'Evelyn Yulia',
            'kelas'      => 'XII RPL 1',
            'tanggal'    => '2026-11-12',
            'status'     => 'Hadir',
            'keterangan' => 'Hadir Terlambat',
        ]);
    }
}