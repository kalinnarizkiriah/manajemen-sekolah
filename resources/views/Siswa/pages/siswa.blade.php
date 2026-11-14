@extends('siswa.index')

@section('content')
    <main class="main">
        <header class="page-header">
            <div>
                <h1>Data Siswa</h1>
                <p class="subtitle">Kelola data siswa Anda.</p>
            </div>
            <!-- Tombol Tambah siswa -->
            <a href="/siswa/tambah" class="btn btn-primary">
                + Tambah Siswa
            </a>
        </header>

       <section class="card">
        <div class="toolbar">
        <input type="text" id="searchData" placeholder="Cari nama siswa...">    
        </div>

            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Siswa</th>
                            <th>NIS</th>
                            <th>Kelas</th>
                            <th>Jenis Kelamin</th>
                            <th>No. Telp</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="daftarSiswa">
                        @foreach ($siswas as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama_siswa }}</td>
                                <td>{{ $item->nis }}</td>
                                <td>{{ $item->kelas }}</td>
                                <td>{{ $item->jenis_kelamin }}</td>
                                <td>{{ $item->no_telepon }}</td>
                                <td>
                                    <!-- Link Edit dan Hapus siswa -->
                                    <a class="btn btn-secondary" href="/siswa/edit/{{ $item->id }}">Edit</a>
                                    <form action="/siswa/hapus/{{ $item->id }}" method="POST"
                                        style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus data siswa ini?')">Hapus</button>
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