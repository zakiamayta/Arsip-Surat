@extends('layouts.app')

@section('title', 'Edit Kategori Surat')

@section('content')
<div class="card shadow-sm border-0 rounded-3 p-4">
    <h3 class="mb-3">Edit Kategori Surat</h3>
    <p class="text-muted">Perbarui data kategori surat pada form berikut.</p>

    <form method="POST" action="{{ route('kategori.update', $kategori->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama_kategori" class="form-label">Nama Kategori <span class="text-danger">*</span></label>
            <input type="text" 
                   name="nama_kategori" 
                   id="nama_kategori"
                   class="form-control @error('nama_kategori') is-invalid @enderror"
                   value="{{ old('nama_kategori', $kategori->nama_kategori) }}" 
                   required>
            @error('nama_kategori')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <textarea name="keterangan" id="keterangan" class="form-control" rows="3">{{ old('keterangan', $kategori->keterangan) }}</textarea>
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('kategori.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection
