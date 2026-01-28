<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Menghitung jumlah data untuk ditampilkan di kartu statistik
        $data = [
            'totalBerita'   => Berita::count(),
            'totalDokumen'  => 0, // Ganti dengan Model Dokumen jika sudah ada
            'totalProsedur' => 0, // Ganti dengan Model SOP jika sudah ada
            'totalFaq'      => 0, // Ganti dengan Model FAQ jika sudah ada
        ];

        return view('dashboard', $data);
    }
}