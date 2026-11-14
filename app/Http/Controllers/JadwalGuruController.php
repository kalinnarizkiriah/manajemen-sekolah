<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JadwalGuru;

class JadwalGuruController extends Controller
{
    //index
    public function index(){
        //buat ngambil data dari model JadwalGuru
        $jadwal_gurus = JadwalGuru::get();

        return view('jadwal.pages.jadwal', compact('jadwal_gurus'));
    }

    // Menampilkan halaman form tambah guru
    public function create()
    {
        return view('jadwal.pages.tambah');
    }

    // Menyimpan data baru ke database
    public function store(Request $request)
    {
        // Validasi data inputan
        $request->validate([
            'nama_guru' => 'required|string|max:255',
            'hari' => 'required|string|max:255',
            'mata_pelajaran' => 'required|string|max:255',
            'kelas' => 'required|string|max:255',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
        ]);

        // Simpan ke database menggunakan Model JadwalGuru
        JadwalGuru::create([
            'nama_guru' => $request->nama_guru,
            'hari' => $request->hari,
            'mata_pelajaran' => $request->mata_pelajaran,
            'kelas' => $request->kelas,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
        ]);

        // Jika berhasil, kembalikan ke halaman daftar jadwal
        return redirect()->route('jadwal.table')->with('success', 'Jadwal guru berhasil ditambahkan!');
    }

    // Menampilkan halaman form edit jadwal guru berdasarkan ID
    public function edit($id)
    {
        $jadwal = JadwalGuru::findOrFail($id); // Mencari data guru berdasarkan ID
        return view('jadwal.pages.update', compact('jadwal')); // Mengirim variabel $guru ke view update.blade.php
    }

    // Menyimpan perubahan data ke database
    public function update(Request $request, $id)
    {
        // Validasi data inputan
        $request->validate([
           'nama_guru'      => 'required|string|max:255',
            'hari'           => 'required|string|max:255',
            'mata_pelajaran' => 'required|string|max:255',
            'kelas'          => 'required|string|max:255',
            'jam_mulai'      => 'required',
            'jam_selesai'    => 'required',
        ]);

        // Cari data guru berdasarkan ID, lalu update datanya
        $jadwal = JadwalGuru::findOrFail($id);
        $jadwal->update([
            'nama_guru'      => $request->nama_guru,
            'hari'           => $request->hari,
            'mata_pelajaran' => $request->mata_pelajaran,
            'kelas'          => $request->kelas,
            'jam_mulai'      => $request->jam_mulai,
            'jam_selesai'    => $request->jam_selesai,
        ]);

        // Jika berhasil, kembalikan ke halaman daftar guru
        return redirect()->route('jadwal.table')->with('success', 'Data jadwal guru berhasil diperbarui!');
    }

    // destroy -> menghapus data
    public function destroy(JadwalGuru $jadwal)
    {
        $jadwal->delete();
        return redirect()->route('jadwal.table')->with('success', 'Data jadwal berhasil dihapus');
    }

}
