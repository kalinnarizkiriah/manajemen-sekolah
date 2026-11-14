@extends('guru.index')

@section('content')
    <main class="main">
        <header class="page-header">
            <div>
                <h1>Jadwal Guru</h1>
                <p class="subtitle">Kelola data jadwal mengajar guru Anda.</p>
            </div>
            <!-- Tombol Tambah Jadwal -->
            <a href="/jadwal/tambah" class="btn btn-primary">
                + Tambah Jadwal
            </a>
        </header>

       <section class="card">
        <div class="toolbar">
        <input type="text" id="searchData" placeholder="Cari nama guru...">    
        </div>

            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Guru</th>
                            <th>Hari</th>
                            <th>Mata Pelajaran</th>
                            <th>Kelas</th>
                            <th>Jam Mulai</th>
                            <th>Jam Selesai</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="daftarJadwal">
                        @foreach ($jadwal_gurus as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama_guru }}</td>
                                <td>{{ $item->hari }}</td>
                                <td>{{ $item->mata_pelajaran }}</td>
                                <td>{{ $item->kelas }}</td>
                                <td>{{ $item->jam_mulai }}</td>
                                <td>{{ $item->jam_selesai }}</td>
                                <td>
                                    <!-- Link Edit dan Hapus Jadwal -->
                                    <a class="btn btn-secondary" href="/jadwal/edit/{{ $item->id }}">Edit</a>
                                    <form action="/jadwal/hapus/{{ $item->id }}" method="POST"
                                        style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus data jadwal ini?')">Hapus</button>
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