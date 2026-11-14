@extends('guru.index')

@section('content')
    <main class="main">
        <header class="page-header">
            <div>
                <h1>Tambah Jadwal Guru</h1>
                <p class="subtitle">Tambahkan informasi jadwal mengajar guru.</p>
            </div>
        </header>

        <section class="card form-card">
            <form id="formTambah" action="{{ route('jadwal.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nama_guru">
                        Nama Guru <span class="required">*</span>
                    </label>
                    <input type="text" id="nama_guru" name="nama_guru" placeholder="Contoh: Kalinna, S.Kom." required>
                </div>

                <div class="form-group">
                    <label for="hari">
                        Hari <span class="required">*</span>
                    </label>
                    <input type="text" id="hari" name="hari" placeholder="Contoh: Senin" required>
                </div>

                <div class="form-group">
                    <label for="mata_pelajaran">
                        Mata Pelajaran <span class="required">*</span>
                    </label>
                    <input type="text" id="mata_pelajaran" name="mata_pelajaran" placeholder="Contoh: Pemrograman Web" required>
                </div>

                <div class="form-group">
                    <label for="kelas">
                        Kelas <span class="required">*</span>
                    </label>
                    <input type="text" id="kelas" name="kelas" placeholder="Contoh: XII RPL 2" required>
                </div>

                <div class="form-group">
                    <label for="jam_mulai">
                        Jam Mulai <span class="required">*</span>
                    </label>
                    <input type="time" id="jam_mulai" name="jam_mulai" placeholder="Contoh: 07:00" required>
                </div>

                <div class="form-group">
                    <label for="jam_selesai">
                        Jam Selesai <span class="required">*</span>
                    </label>
                    <input type="time" id="jam_selesai" name="jam_selesai" placeholder="Contoh: 09:30" required>
                </div>

                <div class="form-actions">
                    <!-- Tombol Batal kembali ke tabel jadwal -->
                    <a href="{{ route('jadwal.table') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">
                        Tambah Jadwal
                    </button>
                </div>
            </form>
        </section>
    </main>
@endsection