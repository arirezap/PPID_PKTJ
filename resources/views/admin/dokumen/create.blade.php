<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Dokumen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            border: none;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-success text-white">
                        <h4 class="mb-0">Upload Dokumen Baru</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('dokumen.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="mb-3">
                                <label class="form-label">Judul Dokumen *</label>
                                <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" 
                                       value="{{ old('judul') }}" required>
                                @error('judul')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Kategori</label>
                                <select name="kategori" class="form-select">
                                    <option value="">Pilih Kategori (Opsional)</option>
                                    <option value="Laporan">Laporan</option>
                                    <option value="Surat">Surat</option>
                                    <option value="Panduan">Panduan</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">File Dokumen *</label>
                                <input type="file" name="file" class="form-control @error('file') is-invalid @enderror" 
                                       accept=".pdf,.doc,.docx" required>
                                <small class="text-muted">Format: PDF, DOC, DOCX (Max 5MB)</small>
                                @error('file')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-success">Upload</button>
                                <a href="{{ route('dokumen.index') }}" class="btn btn-secondary">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>