<x-app-layout>
    <div class="container-fluid px-4 py-4">
        <div class="row">
            <div class="col-md-8">
                <div class="card border-0 shadow-sm rounded-xl mb-4">
                    <div class="card-header bg-white p-4 border-b">
                        <h6 class="font-bold text-gray-700 m-0 uppercase">Publikasi Artikel Terkini</h6>
                    </div>
                    <div class="card-body p-5 text-center text-gray-400 italic">
                        Belum ada konten berita.
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                
                <div class="card border-0 shadow-sm rounded-xl p-4 mb-4">
                    <h6 class="font-bold text-gray-800 mb-3 flex items-center uppercase">
                        <span class="mr-2 text-warning">📂</span> MENU PROFIL PPID
                    </h6>
                    <div class="flex flex-wrap gap-x-2 gap-y-2 text-sm text-gray-600">
                        <a href="{{ route('admin.profil.edit') }}">● Profil PPID</a>
                        <a href="{{ route('admin.profil.edit') }}">● Tugas & Tanggung Jawab</a>
                        <a href="{{ route('admin.profil.edit') }}">● Visi & Misi</a>
                        <a href="{{ route('admin.profil.edit') }}">● Struktur Organisasi</a>
                        <a href="{{ route('admin.profil.edit') }}">● Regulasi</a>
                        <a href="{{ route('admin.profil.edit') }}">● Kontak</a>
                    </div>
                </div>

                <div class="card border-0 shadow-sm rounded-xl p-4 mb-4">
                    <h6 class="font-bold text-gray-800 mb-3 flex items-center uppercase">
                        <span class="mr-2 text-primary">📊</span> INFORMASI PUBLIK
                    </h6>
                    <div class="flex flex-wrap gap-x-2 gap-y-2 text-sm text-gray-600">
                        <a href="{{ route('admin.dokumen.index') }}">● Informasi Berkala</a>
                        <a href="{{ route('admin.dokumen.index') }}">● Informasi Serta Merta</a>
                        <a href="{{ route('admin.dokumen.index') }}">● Informasi Setiap Saat</a>
                        <a href="{{ route('admin.dokumen.index') }}">● Informasi Dikecualikan</a>
                    </div>
                </div>

                <div class="card border-0 shadow-sm rounded-xl p-4">
                    <h6 class="font-bold text-gray-800 mb-3 flex items-center uppercase">
                        <span class="mr-2 text-secondary">🔗</span> LAYANAN TERKAIT
                    </h6>
                    <div class="flex gap-3 text-xs font-bold text-gray-500 uppercase">
                        <a href="{{ route('admin.lpse.index') }}">Data LPSE</a>
                        <a href="#">JDIH</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>