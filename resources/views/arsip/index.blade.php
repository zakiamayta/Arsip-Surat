@extends('layouts.app')

@section('title', 'Daftar Arsip Surat')

@section('content')
<div class="card shadow-sm border-0 rounded-3 p-4">

    <h3 class="mb-3">Arsip Surat</h3>
    <p class="text-muted">
        Berikut ini adalah surat-surat yang telah terbit dan diarsipkan. <br>
        Klik <b>"Lihat"</b> pada kolom aksi untuk menampilkan surat.
    </p>

    {{-- Alert Success --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <form action="{{ route('arsip.index') }}" method="GET" class="d-flex mb-3">
        <input type="text" name="search" class="form-control me-2"
               placeholder="Cari berdasarkan Nomor Surat, Judul, atau Kategori..." value="{{ request('search') }}">
        <button type="submit" class="btn btn-primary">Cari</button>
    </form>

    {{-- Kode tabel di sini ... --}}
    <table class="table table-bordered table-striped align-middle text-center">
        <thead class="table-dark">
            <tr>
                <th>Nomor Surat</th>
                <th>Kategori</th>
                <th>Judul</th>
                <th>Waktu Pengarsipan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($arsip as $item)
            <tr>
                <td>{{ $item->nomor_surat }}</td>
                <td>{{ $item->kategori->nama_kategori }}</td>
                <td>{{ $item->judul }}</td>
                <td>{{ \Carbon\Carbon::parse($item->waktu_pengarsipan)->format('Y-m-d H:i') }}</td>
                <td>
                    <form action="{{ route('arsip.destroy', $item->id) }}" method="POST" class="d-inline delete-form">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-sm btn-danger btn-delete">Hapus</button>
                    </form>

                    @if ($item->file_path)
                    <a href="{{ route('arsip.download', $item->id) }}" class="btn btn-sm btn-warning">
                        Unduh
                    </a>
                    @endif

                    @if ($item->file_path)
                    <a href="{{ route('arsip.lihat', $item->id) }}" class="btn btn-sm btn-info">
                        Lihat >>
                    </a>
                    @endif
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">Tidak ada arsip surat.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-3">
        <a href="{{ route('arsip.create') }}" class="btn btn-success">Arsipkan Surat..</a>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.querySelectorAll('.btn-delete').forEach(button => {
        button.addEventListener('click', function () {
            let form = this.closest('form');

            Swal.fire({
                title: 'Yakin?',
                text: "Arsip surat ini akan dihapus permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
</script>
@endpush