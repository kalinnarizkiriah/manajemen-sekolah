@extends('siswa.index')

@section('content')
    <main class="main">
        <header class="page-header">
            <div>
                <h1>Update Absensi</h1>
                <p class="subtitle">Perbarui data absensi siswa.</p>
            </div>
        </header>

        <section class="card form-card">
            <form id="formUpdate" action="{{ route('absensi.update', $absensi->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="nama_siswa">Nama Siswa <span class="required">*</span></label>
                    <input type="text" id="nama_siswa" name="nama_siswa" value="{{ $absensi->nama_siswa }}" required>
                </div>

                <div class="form-group">
                    <label for="kelas">Kelas <span class="required">*</span></label>
                    <input type="text" id="kelas" name="kelas" value="{{ $absensi->kelas }}" required>
                </div>

                <div class="form-group">
                    <label for="tanggal">Tanggal <span class="required">*</span></label>
                    <input type="date" id="tanggal" name="tanggal"
                        value="{{ \Carbon\Carbon::parse($absensi->tanggal)->format('Y-m-d') }}" required>
                </div>

                <div class="form-group">
                    <label for="status">Status <span class="required">*</span></label>
                    <select id="status" name="status" required>
                        @foreach (['Hadir', 'Izin', 'Sakit', 'Alpha'] as $st)
                            <option value="{{ $st }}" {{ $absensi->status == $st ? 'selected' : '' }}>{{ $st }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <input type="text" id="keterangan" name="keterangan" value="{{ $absensi->keterangan }}"
                        placeholder="Contoh: Hadir terlambat">
                </div>

                <div class="form-actions">
                    <a href="{{ route('absensi.table') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">Perbarui Absensi</button>
                </div>
            </form>
        </section>
    </main>
@endsection