<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DokumenController extends Controller
{
    public function index()
    {
        $dokumen = Dokumen::latest()->get();
        return view('admin.dokumen.index', compact('dokumen'));
    }

    public function create()
    {
        return view('admin.dokumen.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|max:255',
            'file' => 'required|file|mimes:pdf,doc,docx|max:5120',
            'kategori' => 'nullable|string'
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $path = $file->store('dokumen', 'public');

            Dokumen::create([
                'judul' => $validated['judul'],
                'file_path' => $path,
                'kategori' => $validated['kategori'] ?? null,
                'user_id' => auth()->id()
            ]);

            return redirect()->route('dokumen.index')->with('success', 'Dokumen berhasil diupload!');
        }

        return back()->with('error', 'Gagal upload dokumen');
    }

    public function destroy($id)
    {
        $dokumen = Dokumen::findOrFail($id);
        
        if ($dokumen->file_path) {
            Storage::disk('public')->delete($dokumen->file_path);
        }
        
        $dokumen->delete();

        return redirect()->route('dokumen.index')->with('success', 'Dokumen berhasil dihapus!');
    }
}