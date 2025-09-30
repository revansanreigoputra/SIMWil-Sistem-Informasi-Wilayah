<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    public function index()
    {
        $beritas = Berita::latest()->get();
        return view('pages.utama.berita.index', compact('beritas'));
    }

    public function create()
    {
        return view('pages.utama.berita.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required|max:255',
            'isi_berita' => 'required',
            'fupload' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $gambarPath = $request->file('fupload')->store('public/foto_berita');

        $dataToStore = [
            'judul' => $validatedData['judul'],
            'slug' => Str::slug($validatedData['judul'], '-'),
            'isi_berita' => $validatedData['isi_berita'],
            'gambar' => basename($gambarPath)
        ];

        Berita::create($dataToStore);

        $notification = [
            'message' => 'Berita berhasil ditambahkan!',
            'alert-type' => 'success'
        ];

        return redirect()->route('utama.berita.index')->with($notification);
    }

    public function edit(Berita $berita)
    {
        return view('pages.utama.berita.edit', compact('berita'));
    }

    public function update(Request $request, Berita $berita)
    {
        $validatedData = $request->validate([
            'judul' => 'required|max:255',
            'isi_berita' => 'required',
            'fupload' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $dataToUpdate = [
            'judul' => $validatedData['judul'],
            'slug' => Str::slug($validatedData['judul'], '-'),
            'isi_berita' => $validatedData['isi_berita'],
        ];

        if ($request->hasFile('fupload')) {
            if ($berita->gambar) {
                Storage::delete('public/foto_berita/' . $berita->gambar);
            }

            $gambarPath = $request->file('fupload')->store('public/foto_berita');
            $dataToUpdate['gambar'] = basename($gambarPath);
        }

        $berita->update($dataToUpdate);

        $notification = [
            'message' => 'Berita berhasil diperbarui!',
            'alert-type' => 'success'
        ];

        return redirect()->route('utama.berita.index')->with($notification);
    }

    public function destroy(Berita $berita)
    {
        if ($berita->gambar) {
            Storage::delete('public/foto_berita/' . $berita->gambar);
        }

        $berita->delete();

        $notification = [
            'message' => 'Berita berhasil dihapus!',
            'alert-type' => 'success'
        ];

        return redirect()->route('utama.berita.index')->with($notification);
    }

    public function show(Berita $berita)
    {
        return view('pages.utama.berita.show', compact('berita'));
    }
}
