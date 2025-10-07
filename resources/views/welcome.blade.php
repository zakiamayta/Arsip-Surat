<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang di Aplikasi Arsip Surat</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <style>
        /* CSS Tambahan untuk memusatkan konten di tengah layar */
        body {
            background-color: #f8f9fa; /* Warna background aplikasi */
        }
        .full-screen-center {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>
<body>
    <div class="full-screen-center">
        <div class="card shadow-lg p-5 rounded-3 border-0" style="max-width: 500px;">
            <div class="text-center">
                
                {{-- Icon Placeholder --}}
                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-box-seam-fill text-primary mb-4" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M11 6.38a.5.5 0 0 0-.416.275L6.937 10.35a.5.5 0 0 0-.012.277l1.378 2.054A.5.5 0 0 0 9 13.62V6.38zm-1.07 7.749L12.5 10.42V7.75l-2.57 3.844.004 2.894zM7.173 13.792h.001l-1.644-2.896.79-1.18 2.87.558-.002.001-1.378 2.054a.5.5 0 0 1-.416.275H7.173z"/>
                    <path fill-rule="evenodd" d="M12.923 10.334l.79.141L15 8.169v-3.83l-2.5 1.5-1.571-2.355L8.5.011 4.5 2.5 1.5 0l-.79 1.18L0 4.34v7.818l5.501 3.298L8 15.62l.004.002 7.126-4.275-.002-.001-.137-.083zM1 10.42l1.5-2.25L1 7.75v2.67z"/>
                </svg>

                <h1 class="mb-3" style="font-weight: 600;">Selamat Datang di Aplikasi Arsip Surat</h1>
                
                <p class="lead text-muted mb-4">
                    Sistem ini digunakan untuk pengelolaan data surat masuk, surat keluar, dan kategori surat secara digital.
                </p>
                
                {{-- Tombol masuk ke Aplikasi yang mengarah ke route 'arsip.index' --}}
                <a href="{{ route('arsip.index') }}" class="btn btn-primary btn-lg w-100 mt-3 shadow-sm">
                    Masuk ke Aplikasi
                </a>
                
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>