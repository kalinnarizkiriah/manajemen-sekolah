@extends('siswa.index')

@section('content')
    <main class="main">
        <header class="page-header">
            <div>
                <h1>Tambah Data Siswa</h1>
                <p class="subtitle">Tambahkan data siswa Anda.</p>
            </div>
        </header>

        <section class="card form-card">
            <form id="formTambah" action="{{ route('siswa.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nis">
                        NIS <span class="required">*</span>
                    </label>
                    <input type="number" id="nis" name="nis" placeholder="Contoh: 00998877" required>
                </div>

                <div class="form-group">
                    <label for="nama_siswa">
                        Nama Siswa <span class="required">*</span>
                    </label>
                    <input type="text" id="nama_siswa" name="nama_siswa" placeholder="Contoh: Kalinna Rizki Riah" required>
                </div>


                <div class="form-group">
                    <label for="kelas">
                        Kelas <span class="required">*</span>
                    </label>
                    <input type="text" id="kelas" name="kelas" placeholder="Contoh: XII RPL 2" required>
                </div>
                
                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin <span class="required">*</span>
                    </label>
                    <select id="jenis_kelamin" name="jenis_kelamin" required>
                        <option value="" disabled selected>Pilih Jenis Kelamin</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="no_telepon">
                        No. Telepon <span class="required">*</span>
                    </label>
                    <input type="number" id="no_telepon" name="no_telepon" placeholder="Contoh: 081234567890" required>
                </div>

                <div class="form-actions">
                    <!-- Tombol Batal kembali ke tabel siswa -->
                    <a href="{{ route('siswa.table') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">
                        Tambah Data Siswa
                    </button>
                </div>
            </form>
        </section>
    </main>
@endsection