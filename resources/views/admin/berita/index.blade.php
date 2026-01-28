<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Kelola Berita
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-xl font-bold text-gray-800 uppercase">Daftar Berita</h2>
                    <a href="{{ route('admin.berita.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md font-bold transition">
                        + TAMBAH BERITA
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full border-collapse border border-gray-200">
                        <thead>
                            <tr class="bg-gray-100 text-gray-700 uppercase text-sm">
                                <th class="p-3 border text-center w-16">NO</th>
                                <th class="p-3 border text-left">JUDUL BERITA</th>
                                <th class="p-3 border text-center w-40">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($beritas as $index => $b)
                            <tr class="border-b hover:bg-gray-50 transition">
                                <td class="p-3 text-center border">{{ $index + 1 }}</td>
                                <td class="p-3 border font-semibold text-gray-800">{{ $b->judul }}</td>
                                <td class="p-3 text-center border">
                                    <a href="{{ route('admin.berita.edit', $b->id) }}" class="bg-yellow-400 text-white px-3 py-1 rounded text-xs font-bold uppercase">Edit</a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="p-4 text-center text-gray-500 italic">Belum ada data berita.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>