<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Aplikasi Arsip Surat')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Link Bootstrap Icons untuk ikon monokrom -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <style>
        body {
            background-color: #f8f9fa;
        }
        .sidebar {
            width: 220px;
            min-height: 100vh;
            background: #343a40;
            color: #fff;
            position: fixed;
            top: 0; left: 0;
            padding: 20px;
        }
        .sidebar a {
            color: #fff;
            display: block;
            padding: 10px;
            margin: 4px 0;
            text-decoration: none;
            border-radius: 4px;
        }
        .sidebar a:hover {
            background: #495057;
        }
        .sidebar .nav-item {
            display: flex;
            align-items: center;
        }
        .sidebar .nav-item i {
            margin-right: 10px;
            font-size: 1.1rem; /* Ukuran ikon */
        }
        .content {
            margin-left: 240px;
            padding: 20px;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h4 class="text-white">Menu</h4>
        <hr class="text-white-50">
        
        <a href="{{ route('arsip.index') }}" class="nav-item">
            <i class="bi bi-archive"></i> Arsip
        </a>
        
        <a href="{{ route('kategori.index') }}" class="nav-item">
            <i class="bi bi-tags"></i> Kategori Surat
        </a>
        
        <a href="{{ route('about') }}" class="nav-item">
            <i class="bi bi-info-circle"></i> About
        </a>
    </div>

    <!-- Content -->
    <div class="content">
        @yield('content')
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
