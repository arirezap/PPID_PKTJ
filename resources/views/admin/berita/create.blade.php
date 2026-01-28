<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data Berita - PKTJ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js"></script>
    <style>
        body {
            background-color: #f4f6f9;
        }
        .navbar {
            background-color: #3b5998;
        }
        .sidebar {
            background-color: #2c3e50;
            min-height: 100vh;
            color: white;
        }
        .sidebar .profile {
            padding: 20px;
            text-align: center;
            border-bottom: 1px solid #34495e;
        }
        .sidebar .profile img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: white;
            padding: 5px;
        }
        .sidebar .menu-item {
            padding: 15px 20px;
            color: white;
            text-decoration: none;
            display: block;
            border-left: 4px solid transparent;
        }
        .sidebar .menu-item:hover, .sidebar .menu-item.active {
            background-color: #34495e;
            border-left-color: #3498db;
        }
        .content-header {
            background: white;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .form-card {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .btn-primary {
            background-color: #3498db;
            border: none;
        }
        .btn-secondary {
            background-color: #95a5a6;
            border: none;
        }
        .time-display {
            background-color: #f39c12;
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
            margin: 10px 20px;
        }
    </style>
</head>
<body>
    <!-- Top Navbar -->
    <nav class="navbar navbar-dark">
        <div class="container-fluid">
            <span class="navbar-brand">Politeknik Keselamatan Transportasi Jalan</span>
            <div class="text-white">
                <i class="fas fa-sign-out-alt"></i>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-2 p-0 sidebar">
                <div class="profile">
                    <div class="mb-3">
                        <i class="fas fa-user-circle fa-4x text-white"></i>
                    </div>
                    <h6>IT PKTJ</h6>
                    <small>it.pktj@gmail.com</small>
                </div>

                <div class="time-display">
                    <small>{{ now()->isoFormat('dddd, D MMMM YYYY HH:mm:ss') }}</small>
                </div>

                <div class="mt-3">
                    <p class="px-3 text-uppercase small"><strong>Main Navigation</strong></p>
                    <a href="{{ route('dashboard') }}" class="menu-item">
                        <i class="fas fa-tachometer-alt"></i> Dashboard
                    </a>
                    <a href="#" class="menu-item">
                        <i class="fas fa-info-circle"></i> Tentang PKTJ
                    </a>
                    <a href="#" class="menu-item">
                        <i class="fas fa-file"></i> Halaman
                    </a>
                    <a href="{{ route('berita.index') }}" class="menu-item active">
                        <i class="fas fa-newspaper"></i> Berita
                    </a>
                    <a href="#" class="menu-item">
                        <i class="fas fa-calendar"></i> Agenda
                    </a>
                    <a href="#" class="menu-item">
                        <i class="fas fa-images"></i> Galeri Album
                    </a>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-10 p-4">
                <div class="content-header">
                    <h4 class="mb-0">UBAH DATA BERITA</h4>
                </div>

                <div class="form-card">
                    <form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="mb-4">
                            <label class="form-label fw-bold">Judul berita</label>
                            <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" 
                                   placeholder="Masukkan Judul berita" value="{{ old('judul') }}" required>
                            <small class="text-primary">Untuk penulisan judul maksimal 100 karakter</small>
                            @error('judul')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Sampul / Cover</label>
                            <div class="mb-2">
                                <small class="text-primary">Disarankan memasukkan sampul / cover indah berukuran 700px x 350px</small>
                            </div>
                            <button type="button" class="btn btn-primary btn-sm" onclick="document.getElementById('gambar').click()">
                                Pilih Sampul / Cover
                            </button>
                            <input type="file" id="gambar" name="gambar" class="d-none @error('gambar') is-invalid @enderror" 
                                   accept="image/*" onchange="previewImage(this)">
                            <div id="preview" class="mt-2"></div>
                            @error('gambar')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Kategori Berita</label>
                            <select name="kategori" class="form-select @error('kategori') is-invalid @enderror" required>
                                <option value="">--Pilih Kategori--</option>
                                <option value="Informasi Setiap Saat">Informasi Setiap Saat</option>
                                <option value="Informasi Berkala">Informasi Berkala</option>
                                <option value="Informasi Serta Merta">Informasi Serta Merta</option>
                            </select>
                            @error('kategori')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Isi berita</label>
                            <textarea id="editor" name="isi" class="form-control @error('isi') is-invalid @enderror" rows="15">{{ old('isi') }}</textarea>
                            <small class="text-muted">Powered by TinyMCE</small>
                            @error('isi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Tag Berita</label>
                            <input type="text" name="tags" class="form-control" 
                                   placeholder="Tulis Tag Disini..">
                            <small class="text-muted">Masukkan kata-kata kunci yang digunakan di dalam berita. Berilah <strong>tanda koma (,)</strong> untuk memisahkan kata kunci satu dengan yang lainnya.</small>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Tanggal Berita</label>
                            <input type="date" name="tanggal" class="form-control" value="{{ date('Y-m-d') }}" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Terbitkan</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" value="1" id="ya" checked>
                                    <label class="form-check-label" for="ya">Ya</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" value="0" id="tidak">
                                    <label class="form-check-label" for="tidak">Tidak</label>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> SIMPAN
                            </button>
                            <a href="{{ route('berita.index') }}" class="btn btn-secondary">
                                <i class="fas fa-times"></i> TUTUP
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Initialize TinyMCE
        tinymce.init({
            selector: '#editor',
            height: 400,
            menubar: true,
            plugins: [
                'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
                'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
                'insertdatetime', 'media', 'table', 'help', 'wordcount'
            ],
            toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help'
        });

        // Preview image
        function previewImage(input) {
            const preview = document.getElementById('preview');
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.innerHTML = `<img src="${e.target.result}" class="img-thumbnail" style="max-width: 300px;">`;
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        // Update time
        setInterval(() => {
            const now = new Date();
            const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric', hour: '2-digit', minute: '2-digit', second: '2-digit' };
            document.querySelector('.time-display small').textContent = now.toLocaleDateString('id-ID', options);
        }, 1000);
    </script>
</body>
</html>