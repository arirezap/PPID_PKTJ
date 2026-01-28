<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-8 rounded-xl shadow-lg border-t-4 border-blue-600">
                <h2 class="text-2xl font-bold mb-6 text-blue-900 uppercase">Edit Profil PPID</h2>

                @if(session('success'))
                    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('admin.profil.update') }}" method="POST">
                    @csrf <div class="mb-6">
                        <label class="block font-bold mb-2">JUDUL UTAMA</label>
                        <input type="text" name="judul" value="{{ $profil->judul }}" class="w-full border-gray-300 rounded-lg">
                    </div>

                    <div class="mb-6">
                        <label class="block font-bold mb-2">KONTEN PEMBUKA (GAMBAR 1)</label>
                        <textarea id="editor1" name="konten_pembuka">{{ $profil->konten_pembuka }}</textarea>
                    </div>

                    <div class="mb-6">
                        <label class="block font-bold mb-2 text-blue-700">JUDUL SUB (GAMBARAN SINGKAT)</label>
                        <input type="text" name="judul_sub" value="{{ $profil->judul_sub }}" class="w-full border-gray-300 rounded-lg">
                    </div>

                    <div class="mb-6">
                        <label class="block font-bold mb-2">DETAIL PEMBENTUKAN (GAMBAR 2 & 3)</label>
                        <textarea id="editor2" name="konten_detail">{{ $profil->konten_detail }}</textarea>
                    </div>

                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-10 py-3 rounded-lg font-bold shadow-lg uppercase">
                        Simpan Perubahan Website
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor.create(document.querySelector('#editor1')).catch(error => { console.error(error); });
        ClassicEditor.create(document.querySelector('#editor2')).catch(error => { console.error(error); });
    </script>
</x-app-layout>