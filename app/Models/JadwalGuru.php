<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalGuru extends Model
{
     use HasFactory;

    protected $table = 'jadwal_gurus';//nama tabel yg da di database

    // fillable untuk ngunci kolom 
    protected $fillable = [
        'nama_guru',
        'hari',
        'mata_pelajaran',
        'kelas',
        'jam_mulai',
        'jam_selesai',
    ];
}
