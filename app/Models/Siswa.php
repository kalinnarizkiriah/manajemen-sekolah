<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

        protected $table = 'siswas';//nama tabel yg da di database

    // fillable untuk ngunci kolom 
    protected $fillable = [
        'nis',
        'nama_siswa',
        'kelas',
        'jenis_kelamin',
        'no_telepon',
    ];
}
