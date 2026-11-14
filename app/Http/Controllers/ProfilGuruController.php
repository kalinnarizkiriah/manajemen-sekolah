<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfilGuru;

class ProfilGuruController extends Controller
{
    //index
    public function index(){
        //buat ngambil data dari model profilguru
        $profil_gurus = ProfilGuru::get();

        return view('guru.pages.guru', compact('profil_gurus'));
    }

    // Menampilkan halaman form tambah guru
    public function create()
    {
        return view('guru.pages.tambah');
    }

    // Menyimpan data baru ke database
    public function store(Request $request)
    {
        // Validasi data inputan
        $request->validate([
            'nama_guru' => 'required|string|max:255',
            'nip' => 'required',
            'bidang_studi' => 'required|string|max:255',
            'no_telepon' => 'required|numeric',
        ]);

        // Simpan ke database menggunakan Model Pengumuman
        ProfilGuru::create([
            'nama_guru' => $request->nama_guru,
            'nip' => $request->nip,
            'bidang_studi' => $request->bidang_studi,
            'no_telepon' => $request->no_telepon,
        ]);

        // Jika berhasil, kembalikan ke halaman daftar pengumuman
        return redirect()->route('guru.table')->with('success', 'Jadwal pelajaran berhasil ditambahkan!');
    }

    // Menampilkan halaman form edit guru berdasarkan ID
    public function edit($id)
    {
        $guru = ProfilGuru::findOrFail($id); // Mencari data guru berdasarkan ID
        return view('guru.pages.update', compact('guru')); // Mengirim variabel $guru ke view update.blade.php
    }

    // Menyimpan perubahan data ke database
    public function update(Request $request, $id)
    {
        // Validasi data inputan
        $request->validate([
            'nama_guru' => 'required|string|max:255',
            'nip' => 'required',
            'bidang_studi' => 'required|string|max:255',
            'no_telepon' => 'required|numeric',
        ]);

        // Cari data guru berdasarkan ID, lalu update datanya
        $guru = ProfilGuru::findOrFail($id);
        $guru->update([
            'nama_guru' => $request->nama_guru,
            'nip' => $request->nip,
            'bidang_studi' => $request->bidang_studi,
            'no_telepon' => $request->no_telepon,
        ]);

        // Jika berhasil, kembalikan ke halaman daftar guru
        return redirect()->route('guru.table')->with('success', 'Data guru berhasil diperbarui!');
    }

    // destroy -> menghapus data
    public function destroy(ProfilGuru $guru)
    {
        $guru->delete();
        return redirect()->route('guru.table')->with('success', 'Data berhasil dihapus');
    }

}
