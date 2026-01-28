<?php

namespace App\Http\Controllers;

use App\Models\ProfilPpid;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProfilPpidController extends Controller
{
    /**
     * Menampilkan halaman edit Profil PPID
     */
    public function index(): View
    {
        // Mengambil data pertama, jika tidak ada maka siapkan objek kosong
        $profil = ProfilPpid::first() ?? new ProfilPpid();
        return view('admin.profil.index', compact('profil'));
    }

    /**
     * Menyimpan atau mengupdate data Profil PPID sesuai Gambar 1-3
     */
    public function update(Request $request)
    {
        // Validasi sederhana agar data tidak kosong
        $request->validate([
            'judul' => 'required',
            'konten_pembuka' => 'required',
        ]);

        // Proses simpan data ke tabel profil_ppids
        ProfilPpid::updateOrCreate(
            ['id' => 1],
            [
                'judul'          => $request->judul,
                'konten_pembuka' => $request->konten_pembuka,
                'judul_sub'      => $request->judul_sub,
                'konten_detail'  => $request->konten_detail,
            ]
        );

        return back()->with('success', 'Profil PPID Berhasil Diperbarui!');
    }
}