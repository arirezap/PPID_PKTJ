<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Dokumen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar {
            background-color: #dc3545;
        }
        .btn-upload {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
        }
        .btn-upload:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-dark">
        <div class="container-fluid">
            <span class="navbar-text text-white">Selamat Datang, {{ auth()->user()->name }}</span>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-light btn-sm">Keluar (Logout)</button>
            </form>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4>Kelola Dokumen</h4>
            <a href="{{ route('dokumen.create') }}" class="btn-upload">
                + Upload Dokumen Baru
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="card">
            <div class="card-body">
                <table class="table table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th>NO</th>
                            <th>JUDUL</th>
                            <th>FILE</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($dokumen as $key => $dok)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $dok->judul }}</td>
                            <td>
                                <a href="{{ Storage::url($dok->file_path) }}" target="_blank" class="btn btn-info btn-sm">
                                    Lihat File
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('dokumen.destroy', $dok->id) }}" method="POST" 
                                      onsubmit="return confirm('Yakin ingin menghapus dokumen ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center">Belum ada dokumen</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>