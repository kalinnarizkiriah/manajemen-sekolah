@extends('siswa.index')

@section('content')
    <main class="main">
        <header class="page-header">
            <div>
                <h1>Absensi</h1>
                <p class="subtitle">Kelola data absensi siswa.</p>
            </div>
            <a href="{{ route('absensi.create') }}" class="btn btn-primary">
                + Tambah Absensi
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
                            <th>Kelas</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="daftarAbsensi">
                        @foreach ($absensis as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama_siswa }}</td>
                                <td>{{ $item->kelas }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d/m/Y') }}</td>
                                <td>{{ $item->status }}</td>
                                <td>{{ $item->keterangan }}</td>
                                <td>
                                    <a class="btn btn-secondary" href="{{ route('absensi.edit', $item->id) }}">Edit</a>
                                    <form action="{{ route('absensi.destroy', $item->id) }}" method="POST"
                                        style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus data absensi ini?')">Hapus</button>
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