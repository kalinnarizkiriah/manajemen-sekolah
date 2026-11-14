@extends('guru.index')

@section('content')
    <main class="main">
        <header class="page-header">
            <div>
                <h1>Update Guru</h1>
                <p class="subtitle">Perbarui informasi Guru.</p>
            </div>
        </header>

        <section class="card form-card">
            <form id="formUpdate" action="{{ route('guru.update', $guru->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="nama_guru">
                        Nama Guru <span class="required">*</span>
                    </label>
                    <input type="text" id="nama_guru" name="nama_guru" value="{{ $guru->nama_guru }}" placeholder="Contoh: Kalinna Rizki Riah" required>
                </div>

                <div class="form-group">
                    <label for="nip">
                        NIP <span class="required">*</span>
                    </label>
                    <input type="text" id="nip" name="nip" value="{{ $guru->nip }}" placeholder="Contoh: 98756436" required>
                </div>

                <div class="form-group">
                    <label for="bidang_studi">
                        Bidang Studi <span class="required">*</span>
                    </label>
                    <input type="text" id="bidang_studi" name="bidang_studi" value="{{ $guru->bidang_studi }}" placeholder="Contoh: Bahasa Inggris" required>
                </div>

                <div class="form-group">
                    <label for="no_telepon">
                        No. Telepon <span class="required">*</span>
                    </label>
                    <input type="number" id="no_telepon" name="no_telepon" value="{{ $guru->no_telepon }}" placeholder="Contoh: 08123456789" required>
                </div>

                <div class="form-actions">
                    <a href="{{ route('guru.table') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">
                        Perbarui Guru
                    </button>
                </div>
            </form>
        </section>
    </main>
@endsection