# Aplikasi Arsip Surat Digital

Aplikasi ini adalah sistem manajemen arsip surat berbasis web yang dikembangkan menggunakan **Laravel**.  
Tujuannya adalah mempermudah proses pengarsipan, pencarian, dan pengelolaan dokumen surat secara digital.

---

## Tujuan Aplikasi

Aplikasi ini bertujuan untuk:

- **Sentralisasi Data** – Menyediakan platform tunggal untuk menyimpan semua dokumen surat (masuk dan keluar) agar tidak tercecer dalam bentuk fisik.  
- **Efisiensi Pencarian** – Mempercepat proses pencarian dokumen arsip menggunakan fitur pencarian multi-kolom yang fleksibel.  
- **Digitalisasi Dokumen** – Mengurangi ketergantungan pada dokumen kertas dengan menyediakan fitur unduh dan pratinjau file PDF secara langsung.  
- **Tata Kelola Kategori** – Memudahkan pengorganisasian surat berdasarkan kategori yang telah ditentukan.

---

## Fitur Utama

- **Pengarsipan Dokumen**: Menyimpan surat lengkap dengan Nomor Surat, Judul, Kategori, dan file PDF.  
- **Pencarian Cepat**: Fitur pencarian fleksibel berdasarkan Nomor Surat, Judul, atau Kategori.  
- **Aksi Dokumen**: Melihat (preview PDF), Mengunduh, dan Menghapus arsip.  
- **Manajemen Kategori**: Halaman terpisah untuk mengelola data master kategori surat.

---

## Instalasi Lokal (Cara Menjalankan)

Ikuti langkah-langkah di bawah ini untuk menjalankan aplikasi di lingkungan lokal Anda.

### Prasyarat

- PHP **v8.1+**
- Composer
- Database **MySQL/MariaDB**

---

### Langkah-Langkah

#### 1. Clone Repositori
```bash
git clone https://github.com/zakiamayta/arsip-surat.git
cd arsip-surat
```

#### 2. Instal Dependensi PHP
```bash
composer install
```

#### 3. Konfigurasi Environment
```bash
cp .env.example .env
php artisan key:generate
```
Edit file `.env` dan atur detail koneksi database Anda.

#### 4. Migrasi Database
```bash
php artisan migrate --seed
```
> Gunakan `--seed` jika Anda memiliki data awal/dummy.

#### 5. Link Storage (Penting untuk file upload)
```bash
php artisan storage:link
```

#### 6. Jalankan Server
```bash
php artisan serve
```
Aplikasi akan berjalan di:  
[http://127.0.0.1:8000](http://127.0.0.1:8000)

---

## Tampilan Aplikasi (Screenshots)

### 1. Halaman Utama (Daftar Arsip)
![Halaman Utama](https://github.com/user-attachments/assets/7b705bbb-da7e-4ce3-b96b-f3a25c470b2b)

### 2. Lihat Detail Arsip
![Detail Arsip](https://github.com/user-attachments/assets/c3f70b98-cfb9-4c1f-8286-706e520a55dc)

### 3. Tambah Detail Surat (Arsipkan Surat)
![Tambah Arsip](https://github.com/user-attachments/assets/63f1f2f1-8c1c-4724-a531-609c53d39970)

### 4. Hapus Surat
![Hapus Surat](https://github.com/user-attachments/assets/2be679b5-279d-4cdc-9bc6-043b7823888b)

### 5. Kategori Surat
![Kategori Surat](https://github.com/user-attachments/assets/62ddcd9d-bbfc-4963-bb6a-53bbe60e8385)

### 6. Tambah Kategori Surat
![Tambah Kategori](https://github.com/user-attachments/assets/4955d4fb-5378-4d41-8f2f-6ed49de95945)

### 7. Edit Kategori Surat
![Edit Kategori](https://github.com/user-attachments/assets/146ebb68-f4b1-4cdc-97ea-9fa765f86ff8)

### 8. Hapus Kategori Surat
![Hapus Kategori](https://github.com/user-attachments/assets/cdf36555-80b8-46c4-a3d1-f7d917a75347)

### 9. About (Tentang Aplikasi)
![About](https://github.com/user-attachments/assets/caada4e7-7141-4f50-aeda-a6fa41d37b5a)

---

## Teknologi yang Digunakan

| Komponen | Teknologi |
|-----------|------------|
| Framework | Laravel 10/11 |
| Database | MySQL |
| Styling | Bootstrap 5 |

---

## Pengembang

Aplikasi ini dikembangkan sebagai **Proyek untuk memenuhi Sertifikasi LSP** oleh:

**Nama:** Zakia Mayta Proborini  
**NIM:** 2331730117  
**Prodi:** D3 Manajemen Informatika  
**Kampus:** Politeknik Negeri Malang – Kampus Kediri  

