<x-app-layout>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-8 rounded-xl shadow-lg border-t-4 border-yellow-500">
                <h1 class="text-2xl font-bold mb-6 text-gray-800 uppercase border-b pb-4">Edit Data Berita</h1>

                <form action="{{ route('admin.berita.update', $berita->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-6">
                        <label class="block font-bold mb-2 text-gray-700">JUDUL BERITA</label>
                        <input type="text" name="judul" value="{{ old('judul', $berita->judul) }}" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-yellow-500" required>
                    </div>

                    <div class="mb-6">
                        <label class="block font-bold mb-2 text-gray-700">KATEGORI BERITA</label>
                        <select name="kategori" class="w-full border-gray-300 rounded-lg shadow-sm" required>
                            <option value="Informasi Berkala" {{ old('kategori', $berita->kategori) == 'Informasi Berkala' ? 'selected' : '' }}>Informasi Berkala</option>
                            <option value="Informasi Serta Merta" {{ old('kategori', $berita->kategori) == 'Informasi Serta Merta' ? 'selected' : '' }}>Informasi Serta Merta</option>
                            <option value="Informasi Setiap Saat" {{ old('kategori', $berita->kategori) == 'Informasi Setiap Saat' ? 'selected' : '' }}>Informasi Setiap Saat</option>
                        </select>
                    </div>

                    <div class="mb-6">
                        <label class="block font-bold mb-2 text-gray-700">ISI BERITA</label>
                        <textarea id="editor" name="isi">{{ old('isi', $berita->isi) }}</textarea>
                    </div>

                    <div class="flex gap-3 pt-6 border-t">
                        <button type="submit" class="bg-yellow-500 text-white px-8 py-2 rounded-lg font-bold shadow-md hover:bg-yellow-600 uppercase">Update</button>
                        <a href="{{ route('admin.berita.index') }}" class="bg-gray-200 text-gray-700 px-8 py-2 rounded-lg font-bold uppercase text-center">Tutup</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor')) // Pastikan id textarea Anda adalah 'editor'
        .catch(error => {
            console.error(error);
        });
</script>