<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;

class SiswaController extends Controller
{
    public function index()
    {
        $siswas = Siswa::get();
        return view('siswa.pages.siswa', compact('siswas'));
    }

    public function create()
    {
        return view('siswa.pages.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required|unique:siswas,nis',
            'nama_siswa' => 'required|string|max:255',
            'kelas' => 'required|string|max:25',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'no_telepon' => 'required|numeric',
        ]);

        Siswa::create([
            'nis' => $request->nis,
            'nama_siswa' => $request->nama_siswa,
            'kelas' => $request->kelas,
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_telepon' => $request->no_telepon,
        ]);

        return redirect()->route('siswa.table')->with('success', 'Data siswa berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);
        return view('siswa.pages.update', compact('siswa'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nis' => 'required|unique:siswas,nis,' . $id,
            'nama_siswa' => 'required|string|max:255',
            'kelas' => 'required|string|max:25',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'no_telepon' => 'required|numeric',
        ]);

        $siswa = Siswa::findOrFail($id);
        $siswa->update([
            'nis' => $request->nis,
            'nama_siswa' => $request->nama_siswa,
            'kelas' => $request->kelas,
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_telepon' => $request->no_telepon,
        ]);

        return redirect()->route('siswa.table')->with('success', 'Data siswa berhasil diperbarui!');
    }

    public function destroy(Siswa $siswa)
    {
        $siswa->delete();
        return redirect()->route('siswa.table')->with('success', 'Data siswa berhasil dihapus');
    }
}