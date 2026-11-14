@extends('siswa.index')

@section('content')
    <main class="main">
        <header class="page-header">
            <div>
                <h1>Update Data Siswa</h1>
                <p class="subtitle">Perbarui informasi data siswa.</p>
            </div>
        </header>

        <section class="card form-card">
            <!-- Arahkan action ke route siswa.update dengan mengirim ID siswa -->
            <form id="formUpdate" action="{{ route('siswa.update', $siswa->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="nis">
                        NIS <span class="required">*</span>
                    </label>
                    <input type="number" id="nis" name="nis" value="{{ $siswa->nis }}" placeholder="09876543" required>
                </div>

                <div class="form-group">
                    <label for="nama_siswa">
                        Nama Siswa <span class="required">*</span>
                    </label>
                    <input type="text" id="nama_siswa" name="nama_siswa" value="{{ $siswa->nama_siswa }}" placeholder="Contoh: Nur Cahya" required>
                </div>

                <div class="form-group">
                    <label for="kelas">
                        Kelas <span class="required">*</span>
                    </label>
                    <input type="text" id="kelas" name="kelas" value="{{ $siswa->kelas }}" placeholder="Contoh: XII RPL 2" required>
                </div>

                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin <span class="required">*</span>
                    </label>
                    <select id="jenis_kelamin" name="jenis_kelamin" required>
                        <option value="" disabled>Pilih Jenis Kelamin</option>
                        <option value="Laki-laki" {{ (isset($siswa) && $siswa->jenis_kelamin == 'Laki-laki') ? 'selected' : '' }}>Laki-laki</option>
                        <option value="Perempuan" {{ (isset($siswa) && $siswa->jenis_kelamin == 'Perempuan') ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>

                 <div class="form-group">
                    <label for="no_telepon">
                        No. Telepon <span class="required">*</span>
                    </label>
                    <input type="number" id="no_telepon" name="no_telepon" value="{{ $siswa->no_telepon }}" placeholder="Contoh: 085678900987" required>
                </div>

                <div class="form-actions">
                    <!-- Tombol Batal kembali ke tabel siswa -->
                    <a href="{{ route('siswa.table') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">
                        Perbarui Data Siswa
                    </button>
                </div>
            </form>
        </section>
    </main>
@endsection