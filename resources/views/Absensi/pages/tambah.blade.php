@extends('siswa.index')

@section('content')
    <main class="main">
        <header class="page-header">
            <div>
                <h1>Tambah Absensi</h1>
                <p class="subtitle">Tambahkan data absensi siswa.</p>
            </div>
        </header>

        <section class="card form-card">
            <form id="formTambah" action="{{ route('absensi.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="nama_siswa">Nama Siswa <span class="required">*</span></label>
                    <input type="text" id="nama_siswa" name="nama_siswa" placeholder="Contoh: Kalinna Rizki Riah" required>
                </div>

                <div class="form-group">
                    <label for="kelas">Kelas <span class="required">*</span></label>
                    <input type="text" id="kelas" name="kelas" placeholder="Contoh: XII RPL 2" required>
                </div>

                <div class="form-group">
                    <label for="tanggal">Tanggal <span class="required">*</span></label>
                    <input type="date" id="tanggal" name="tanggal" value="{{ date('Y-m-d') }}" required>
                </div>

                <div class="form-group">
                    <label for="status">Status <span class="required">*</span></label>
                    <select id="status" name="status" required>
                        <option value="" disabled selected>Pilih Status</option>
                        <option value="Hadir">Hadir</option>
                        <option value="Izin">Izin</option>
                        <option value="Sakit">Sakit</option>
                        <option value="Alpha">Alpha</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <input type="text" id="keterangan" name="keterangan" placeholder="Contoh: Hadir terlambat">
                </div>

                <div class="form-actions">
                    <a href="{{ route('absensi.table') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">Tambah Absensi</button>
                </div>
            </form>
        </section>
    </main>
@endsection