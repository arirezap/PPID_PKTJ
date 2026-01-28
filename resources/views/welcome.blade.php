<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal PPID PKTJ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body { font-family: 'Arial', sans-serif; background-color: #f8f9fa; }

        /* AKTIFKAN HOVER UNTUK SEMUA MENU */
        @media (min-width: 992px) {
            .nav-item.dropdown:hover .dropdown-menu {
                display: block;
                margin-top: 0;
            }
        }

        .dropdown-menu {
            border: none;
            border-radius: 0;
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
            padding: 0;
        }
        
        .dropdown-item { 
            font-weight: 600; 
            color: #444; 
            padding: 15px 25px !important;
            border-bottom: 1px solid #f1f1f1;
            text-transform: uppercase;
            font-size: 11px;
            white-space: normal;
        }

        .dropdown-item:last-child { border-bottom: none; }
        .dropdown-item:hover { background-color: #f8f9fa; color: #004a99; }

        .hero-section { background-color: #004a99; color: white; padding: 120px 0; text-align: center; }
    </style>
</head>
<body>

    @include('navbar-public')

    <div class="hero-section">
        <div class="container">
            <h1 class="display-5 fw-bold mb-3">Selamat Datang di Portal PPID PKTJ</h1>
            <p class="lead">Layanan Informasi Publik Terintegrasi dan Transparan</p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>