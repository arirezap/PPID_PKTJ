<x-app-layout>
    <div class="container-fluid px-4 py-4">
        <div class="row mb-4">
            <div class="col-md-12 text-center py-3 bg-white rounded-xl shadow-sm border">
                <h2 class="text-2xl font-bold text-gray-800 uppercase">Panel Kendali Admin PPID</h2>
                <p class="text-sm text-gray-500">Pusat Pengelolaan Informasi dan Dokumentasi PKTJ Tegal</p>
            </div>
        </div>
        
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="p-4 rounded-xl shadow-lg text-white" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                    <h6 class="text-xs font-bold opacity-80 uppercase">Berita</h6>
                    <h2 class="text-3xl font-bold my-2">{{ $totalBerita ?? 0 }}</h2>
                    <a href="{{ route('admin.berita.index') }}" class="mt-2 inline-block bg-white text-blue-600 px-4 py-1 rounded-lg text-xs font-bold shadow">KELOLA</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="p-4 rounded-xl shadow-lg text-white" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                    <h6 class="text-xs font-bold opacity-80 uppercase">Dokumen</h6>
                    <h2 class="text-3xl font-bold my-2">{{ $totalDokumen ?? 0 }}</h2>
                    <a href="{{ route('admin.dokumen.index') }}" class="mt-2 inline-block bg-white text-indigo-600 px-4 py-1 rounded-lg text-xs font-bold shadow">KELOLA</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="p-4 rounded-xl shadow-lg text-white" style="background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);">
                    <h6 class="text-xs font-bold opacity-80 uppercase">Prosedur</h6>
                    <h2 class="text-3xl font-bold my-2">{{ $totalProsedur ?? 0 }}</h2>
                    <a href="{{ route('admin.prosedur.index') }}" class="mt-2 inline-block bg-white text-green-700 px-4 py-1 rounded-lg text-xs font-bold shadow">KELOLA</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="p-4 rounded-xl shadow-lg text-white" style="background: linear-gradient(135deg, #fc6076 0%, #ff9a44 100%);">
                    <h6 class="text-xs font-bold opacity-80 uppercase">FAQ</h6>
                    <h2 class="text-3xl font-bold my-2">{{ $totalFaq ?? 0 }}</h2>
                    <a href="{{ route('admin.faq.index') }}" class="mt-2 inline-block bg-white text-red-600 px-4 py-1 rounded-lg text-xs font-bold shadow">KELOLA</a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="card border-0 shadow-sm rounded-xl overflow-hidden">
                    <div class="card-header bg-white p-4 border-b flex justify-between items-center">
                        <h6 class="font-bold text-gray-700 m-0 uppercase">Publikasi Artikel Terkini</h6>
                        <a href="{{ route('admin.berita.create') }}" class="text-xs font-bold text-blue-600 hover:underline">+ TAMBAH ARTIKEL</a>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-hover mb-0 text-sm">
                            <thead class="bg-light text-gray-500 uppercase">
                                <tr>
                                    <th class="p-4">Judul Konten</th>
                                    <th class="p-4 text-center">Status</th>
                                    <th class="p-4 text-right">Terbit Pada</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $recentBerita = \App\Models\Berita::latest()->take(5)->get(); @endphp
                                @forelse($recentBerita as $berita)
                                <tr>
                                    <td class="p-4 font-medium text-gray-700">{{ $berita->judul }}</td>
                                    <td class="p-4 text-center"><span class="badge bg-success">AKTIF</span></td>
                                    <td class="p-4 text-right text-gray-400">{{ $berita->created_at->format('d/m/Y') }}</td>
                                </tr>
                                @empty
                                <tr><td colspan="3" class="p-5 text-center text-gray-300 italic">Belum ada konten berita.</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card border-0 shadow-sm rounded-xl p-4">
                    <h6 class="font-bold text-gray-800 mb-3 flex items-center">
                        <span class="mr-2">📂</span> MENU PROFIL PPID
                    </h6>
                    <hr class="mb-3">
                    <div class="flex flex-wrap gap-x-3 gap-y-2 text-sm text-gray-600">
                        <a href="{{ route('admin.profil.edit') }}" class="hover:text-blue-600">● Profil PPID</a>
                        <a href="{{ route('admin.profil.edit') }}" class="hover:text-blue-600">● Tugas & Tanggung Jawab</a>
                        <a href="{{ route('admin.profil.edit') }}" class="hover:text-blue-600">● Visi & Misi</a>
                        <a href="{{ route('admin.profil.edit') }}" class="hover:text-blue-600">● Struktur Organisasi</a>
                        <a href="{{ route('admin.profil.edit') }}" class="hover:text-blue-600">● Regulasi</a>
                        <a href="{{ route('admin.profil.edit') }}" class="hover:text-blue-600">● Kontak</a>
                    </div>
                    
                    <h6 class="font-bold text-gray-800 mt-5 mb-3 flex items-center">
                        <span class="mr-2">🔗</span> LAYANAN TERKAIT
                    </h6>
                    <div class="flex flex-wrap gap-2">
                        <a href="{{ route('admin.lpse.index') }}" class="px-3 py-1 bg-gray-100 rounded text-xs font-bold text-gray-500 hover:bg-red-500 hover:text-white transition uppercase">Data LPSE</a>
                        <a href="#" class="px-3 py-1 bg-gray-100 rounded text-xs font-bold text-gray-500 hover:bg-blue-600 hover:text-white transition uppercase">JDIH</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>