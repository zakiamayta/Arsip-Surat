@extends('layouts.app')

@section('title', 'About Aplikasi')

@section('content')
<div class="card shadow-sm border-0 rounded-3 p-4">

    <h3 class="mb-3">About</h3>
    <p class="text-muted">
        Informasi mengenai aplikasi ini.
    </p>

    <hr>

    <div class="d-flex align-items-start gap-4">
        {{-- Container Foto (Ukuran 3x4: 120px x 160px) --}}
        <div style="width: 120px; height: 160px; overflow: hidden; border: 1px solid #ccc; flex-shrink: 0;" class="rounded-3 bg-light">
            
            <img src="{{ asset('storage/pas.jpg') }}" 
                alt="Foto Profil" 
                class="img-fluid" 
                style="width: 100%; height: 100%; object-fit: cover;">
                
        </div>

        {{-- Detail Informasi dalam format Tabel --}}
        <div class="info-text mt-1">
            <p class="mb-1"><strong>Aplikasi ini dibuat oleh:</strong></p>
            
            {{-- Menggunakan tabel untuk keselarasan (alignment) --}}
            <table class="table table-borderless table-sm m-0 p-0" style="width: auto;">
                <tbody>
                    <tr>
                        <td class="pe-3"><strong>Nama</strong></td>
                        <td>:</td>
                        <td>Zakia Mayta Proborini</td>
                    </tr>
                    <tr>
                        <td class="pe-3"><strong>Prodi</strong></td>
                        <td>:</td>
                        <td>D3 Manajemen Informatika, Politeknik Negeri Malang Kampus Kediri</td>
                    </tr>
                    <tr>
                        <td class="pe-3"><strong>NIM</strong></td>
                        <td>:</td>
                        <td>2331730117</td>
                    </tr>
                    <tr>
                        <td class="pe-3"><strong>Tanggal</strong></td>
                        <td>:</td>
                        <td>2 Oktober 2025</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection