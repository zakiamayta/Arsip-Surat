@extends('layouts.app')

@section('title', 'Unggah Arsip Surat')

@section('content')
<div class="card shadow-lg border-0 rounded-4 p-4 bg-white">
    <h3 class="mb-3">Arsip Surat >> Unggah</h3>
    <p class="text-muted">
        Unggah surat yang telah terbit pada form ini untuk diarsipkan. <br>
        <small><b>Catatan:</b> Gunakan file berformat <b>PDF</b></small>
    </p>

    <!-- Form -->
    <form action="{{ route('arsip.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Nomor Surat -->
        <div class="mb-3">
            <label class="form-label">Nomor Surat</label>
            <input type="text" name="nomor_surat" class="form-control" required>
        </div>

        <!-- Kategori -->
        <div class="mb-3">
            <label class="form-label">Kategori</label>
            <select name="kategori_id" class="form-select" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach($kategori as $item)
                    <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                @endforeach
            </select>
        </div>

        <!-- Judul -->
        <div class="mb-3">
            <label class="form-label">Judul</label>
            <input type="text" name="judul" class="form-control" required>
        </div>

        <!-- File -->
        <div class="mb-3">
            <label class="form-label">File Surat (PDF)</label>
            <input type="file" name="file_path" class="form-control" accept="application/pdf" required>
        </div>

        <!-- Tombol -->
        <div class="d-flex justify-content-between">
            <a href="{{ route('arsip.index') }}" class="btn btn-secondary">&laquo; Kembali</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>
@endsection
