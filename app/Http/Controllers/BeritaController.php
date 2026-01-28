<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class BeritaController extends Controller
{
    public function index()
    {
        $beritas = Berita::latest()->get(); // Mengambil data terbaru
        return view('admin.berita.index', compact('beritas'));
    }

    public function create()
    {
        return view('admin.berita.create'); // Form tambah berita
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:255',
            'konten' => 'required',
        ]);

        Berita::create([
            'judul'       => $request->judul,
            'slug'        => Str::slug($request->judul),
            'konten'      => $request->konten,
            'user_id'     => Auth::id(), // ID admin yang login
            'status'      => 'published',
            'published_at' => now(),
        ]);

        return redirect()->route('berita.index')->with('success', 'Berita berhasil ditambahkan');
    }

    public function edit($id)
    {
        $b = Berita::findOrFail($id);
        return view('admin.berita.edit', compact('b'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|max:255',
            'konten' => 'required',
        ]);

        $berita = Berita::findOrFail($id);
        $berita->update([
            'judul'  => $request->judul,
            'slug'   => Str::slug($request->judul),
            'konten' => $request->konten,
        ]);

        return redirect()->route('berita.index')->with('success', 'Berita berhasil diperbarui');
    }

    public function destroy($id)
    {
        Berita::findOrFail($id)->delete();
        return redirect()->route('berita.index')->with('success', 'Berita berhasil dihapus');
    }
}