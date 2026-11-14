<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Siswa;


class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         Siswa::create([
            'nis'      => '0099887766',
            'nama_siswa'           => 'Evelyn Yulia',
            'kelas' => 'XII RPL 1',
            'jenis_kelamin'          => 'Perempuan',
            'no_telepon'      => '086578907654',
        ]);
    }
}
