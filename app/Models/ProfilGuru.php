<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilGuru extends Model
{
    use HasFactory;

    protected $table = 'profil_gurus';//nama tabel yg da di database

    // fillable untuk ngunci kolom 
    protected $fillable = [
        'nama_guru',
        'nip',
        'bidang_studi',
        'no_telepon',
    ];
}
