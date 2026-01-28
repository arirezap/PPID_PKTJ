<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Dokumen
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('admin.dokumen.update', $dokumen) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Judul Dokumen</label>
                            <input type="text" name="judul" value="{{ old('judul', $dokumen->judul) }}" 
                                class="shadow border rounded w-full py-2 px-3 text-gray-700 @error('judul') border-red-500 @enderror" required>
                            @error('judul')
                                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Kategori</label>
                            <select name="kategori_id" class="shadow border rounded w-full py-2 px-3 text-gray-700">
                                <option value="">-- Pilih Kategori --</option>
                                @foreach($kategoris as $kategori)
                                    <option value="{{ $kategori->id }}" {{ $dokumen->kategori_id == $kategori->id ? 'selected' : '' }}>
                                        {{ $kategori->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Deskripsi</label>
                            <textarea name="deskripsi" rows="3" class="shadow border rounded w-full py-2 px-3 text-gray-700">{{ old('deskripsi', $dokumen->deskripsi) }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">File Dokumen Saat Ini</label>
                            <p class="text-sm text-gray-600">{{ basename($dokumen->file_path) }} ({{ $dokumen->formatted_file_size }})</p>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Ganti File (Opsional)</label>
                            <input type="file" name="file" class="shadow border rounded w-full py-2 px-3 text-gray-700" 
                                accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx">
                            <p class="text-xs text-gray-500 mt-1">Kosongkan jika tidak ingin mengganti file</p>
                        </div>

                        <div class="flex items-center justify-between">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Update
                            </button>
                            <a href="{{ route('admin.dokumen.index') }}" class="font-bold text-sm text-blue-500 hover:text-blue-800">
                                Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>