@extends('guru.index')

@section('content')
    <main class="main">
        <header class="page-header">
            <div>
                <h1> Profil Guru</h1>
                <p class="subtitle">Kelola data Guru Anda.</p>
            </div>
            <!-- Ubah route jadi URL langsung ke halaman tambah -->
            <a href="/guru/tambah" class="btn btn-primary">
                + Tambah Guru
            </a>
        </header>

       <section class="card">
        <div class="toolbar">
        <input type="text" name="search" placeholder="Cari nama guru..." class="w-full ...">    
        </div>

            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Guru</th>
                            <th>NIP</th>
                            <th>Bidang Studi</th>
                            <th>No. Telp</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="daftarGuru">
                        @foreach ($profil_gurus as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama_guru }}</td>
                                <td>{{ $item->nip }}</td>
                                <td>{{ $item->bidang_studi }}</td>
                                <td>{{ $item->no_telepon }}</td>
                                <td>
                                    <!-- Ubah link Edit dan Hapus pakai URL ID -->
                                    <a class="btn btn-secondary" href="/guru/edit/{{ $item->id }}">Edit</a>
                                    <form action="/guru/hapus/{{ $item->id }}" method="POST"
                                        style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus data guru ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </main>
@endsection