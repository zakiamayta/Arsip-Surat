@extends('layouts.app')

@section('title', 'Lihat Arsip Surat')

@section('content')
<div class="card shadow-sm border-0 rounded-3 p-4">
    <h3 class="mb-3">Detail Arsip Surat</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        <div class="col-md-5">
            <table class="table table-bordered">
                <tr>
                    <th>Nomor Surat</th>
                    <td>{{ $arsip->nomor_surat }}</td>
                </tr>
                <tr>
                    <th>Kategori</th>
                    <td>{{ $arsip->kategori->nama_kategori }}</td>
                </tr>
                <tr>
                    <th>Judul</th>
                    <td>{{ $arsip->judul }}</td>
                </tr>
                <tr>
                    <th>Waktu Pengarsipan</th>
                    <td>{{ \Carbon\Carbon::parse($arsip->waktu_pengarsipan)->format('d M Y H:i') }}</td>
                </tr>
            </table>

            <!-- Form Ganti File (inline) -->
            <div class="card mt-3">
                <div class="card-body">
                    <h5 class="card-title">Ganti File Arsip</h5>
                    <p class="text-muted small">Unggah file PDF baru untuk menggantikan file saat ini. Biarkan kosong jika tidak ingin mengganti.</p>

                    <form action="{{ route('arsip.update', $arsip->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="file" class="form-label">File Baru (PDF)</label>
                            <input type="file" name="file" id="file" accept="application/pdf" class="form-control">
                            @error('file')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">Unggah & Ganti</button>
                            <a href="{{ route('arsip.index') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>

            @if ($arsip->file_path)
                <p class="mt-3 small text-muted">File saat ini: <a href="{{ asset($arsip->file_path) }}" target="_blank">Lihat file</a></p>
            @endif
        </div>

        <div class="col-md-7">
            @if ($arsip->file_path && file_exists(public_path($arsip->file_path)))
                <div class="card">
                    <div class="card-body">
                        <h5>Preview File</h5>
                        <iframe src="{{ asset($arsip->file_path) }}" width="100%" height="700px" style="border:1px solid #ddd"></iframe>
                    </div>
                </div>
            @else
                <div class="alert alert-warning">Tidak ada file terlampir atau file tidak ditemukan.</div>
            @endif
        </div>
    </div>
</div>
@endsection
