<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absensi;

class AbsensiController extends Controller
{
    //index
    public function index(){
        //buat ngambil data dari model Absensi
        $absensis = Absensi::get();

        return view('absensi.pages.absensi', compact('absensis'));
    }

    // Menampilkan halaman form tambah guru
    public function create()
    {
        return view('absensi.pages.tambah');
    }

    // Menyimpan data baru ke database
    public function store(Request $request)
    {
        // Validasi data inputan
        $request->validate([
            'nama_siswa' => 'required|string|max:255',
            'kelas' => 'required|string|max:25',
            'tanggal' => 'required|date',
            'status' => 'required|in:Hadir,Izin,Sakit,Alpha',
            'keterangan' => 'nullable|string|max:255',
        ]);

        // Simpan ke database menggunakan Model Absensi
        Absensi::create([
            'nama_siswa' => $request->nama_siswa,
            'kelas' => $request->kelas,
            'tanggal' => $request->tanggal,
            'status' => $request->status,
            'keterangan' => $request->keterangan,
        ]);

        // Jika berhasil, kembalikan ke halaman daftar absensi
        return redirect()->route('absensi.table')->with('success', 'Absensi berhasil ditambahkan!');
    }

    // Menampilkan halaman form edit absensi guru berdasarkan ID
    public function edit($id)
    {
        $absensi = Absensi::findOrFail($id); // Mencari data guru berdasarkan ID
        return view('absensi.pages.update', compact('absensi')); // Mengirim variabel $guru ke view update.blade.php
    }

    // Menyimpan perubahan data ke database
    public function update(Request $request, $id)
    {
        // Validasi data inputan
        $request->validate([
            'nama_siswa' => 'required|string|max:255',
            'kelas' => 'required|string|max:25',
            'tanggal' => 'required|date',
            'status' => 'required|in:Hadir,Izin,Sakit,Alpha',
            'keterangan' => 'nullable|string|max:255',
        ]);

        // Cari data guru berdasarkan ID, lalu update datanya
        $absensi = Absensi::findOrFail($id);
        $absensi->update([
            'nama_siswa' => $request->nama_siswa,
            'kelas' => $request->kelas,
            'tanggal' => $request->tanggal,
            'status' => $request->status,
            'keterangan' => $request->keterangan,
        ]);

        // Jika berhasil, kembalikan ke halaman daftar guru
        return redirect()->route('absensi.table')->with('success', 'Absensi berhasil diperbarui!');
    }

    // destroy -> menghapus data
    public function destroy(Absensi $absensi)
    {
        $absensi->delete();
        return redirect()->route('absensi.table')->with('success', 'Absensi berhasil dihapus');
    }

}
