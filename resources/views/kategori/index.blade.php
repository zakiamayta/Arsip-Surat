@extends('layouts.app')

@section('title', 'Kategori Surat')

@section('content')
<div class="card shadow-sm border-0 rounded-3 p-4">

    <h3 class="mb-3">Kategori Surat</h3>
    <p class="text-muted">
        Berikut ini adalah kategori yang bisa digunakan untuk melabeli surat  
        Klik <b>"Tambah Kategori Baru"</b> untuk menambahkan kategori baru.
    </p>

    <!-- Alert Success -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Form Pencarian -->
    <form method="GET" action="{{ route('kategori.index') }}" class="d-flex mb-3">
        <input type="text" name="search" class="form-control me-2" placeholder="Cari kategori..." value="{{ $search }}">
        <button type="submit" class="btn btn-primary">Cari</button>
    </form>

    <!-- Tabel Kategori -->
    <table class="table table-bordered table-striped align-middle text-center">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nama Kategori</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        @forelse($kategori as $k)
            <tr>
                <td>{{ $k->id }}</td>
                <td>{{ $k->nama_kategori }}</td>
                <td>{{ $k->keterangan }}</td>
                <td>
                    <!-- Tombol Hapus -->
                    <form action="{{ route('kategori.destroy', $k->id) }}" method="POST" class="d-inline delete-form">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-sm btn-danger btn-delete">Hapus</button>
                    </form>

                    <!-- Tombol Edit -->
                    <a href="{{ route('kategori.edit', $k->id) }}" class="btn btn-sm btn-info">Edit</a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="text-center">Tidak ada kategori surat.</td>
            </tr>
        @endforelse
        </tbody>
    </table>

    <!-- Tombol Tambah -->
    <div class="mt-3">
        <a href="{{ route('kategori.create') }}" class="btn btn-success">[+] Tambah Kategori Baru</a>
    </div>
</div>
@endsection

@push('scripts')
<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.querySelectorAll('.btn-delete').forEach(button => {
        button.addEventListener('click', function () {
            let form = this.closest('form');

            Swal.fire({
                title: 'Yakin?',
                text: "Kategori ini akan dihapus permanen!",
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
