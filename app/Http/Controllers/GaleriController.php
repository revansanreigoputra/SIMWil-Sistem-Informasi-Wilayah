<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    public function index()
    {
        $albums = Galeri::withCount('photos')->latest()->get();
        return view('pages.utama.galeri.index', compact('albums'));
    }

    public function store(Request $request)
    {
        $request->validateWithBag('storeAlbum', [
            'album' => 'required|string|max:255|unique:galeris,album',
        ]);

        Galeri::create(['album' => $request->album]);
        // Diubah dari 'success' menjadi 'message'
        return redirect()->route('utama.galeri.index')->with('message', 'Album baru berhasil dibuat!');
    }

    public function show(Galeri $galeri)
    {
        $galeri->load('photos');
        return view('pages.utama.galeri.show', ['album' => $galeri]);
    }

    public function update(Request $request, Galeri $galeri)
    {
        $request->validateWithBag('updateAlbum', [
            'album' => 'required|string|max:255|unique:galeris,album,' . $galeri->id,
        ]);

        $galeri->update(['album' => $request->album]);
        // Diubah dari 'success' menjadi 'message'
        return redirect()->route('utama.galeri.index')->with('message', 'Nama album berhasil diperbarui!');
    }

    public function destroy(Galeri $galeri)
    {
        $galeri->load('photos');
        foreach ($galeri->photos as $photo) {
            Storage::delete('public/foto_foto/' . $photo->foto);
        }
        $galeri->delete();
        // Diubah dari 'success' menjadi 'message'
        return redirect()->route('utama.galeri.index')->with('message', 'Album dan seluruh fotonya berhasil dihapus!');
    }

    /*
    |--------------------------------------------------------------------------
    | FUNGSI UNTUK MANAJEMEN FOTO
    |--------------------------------------------------------------------------
    */

    public function createPhoto(Galeri $galeri)
    {
        return view('pages.utama.galeri.photo.create', ['album' => $galeri]);
    }

    public function storePhoto(Request $request, Galeri $galeri)
    {
        $request->validate([
            'fupload'   => 'required|array',
            'fupload.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('fupload')) {
            foreach ($request->file('fupload') as $file) {
                $filename = $file->hashName();
                $file->storeAs('public/foto_foto', $filename);
                Photo::create([
                    'galeri_id' => $galeri->id,
                    'foto' => $filename
                ]);
            }
        }
        // Diubah dari 'success' menjadi 'message'
        return redirect()->route('utama.galeri.show', $galeri->id)->with('message', 'Foto-foto baru berhasil diunggah!');
    }

    public function destroyPhoto(Galeri $galeri, Photo $photo)
    {
        if ($photo->galeri_id != $galeri->id) {
            abort(404);
        }
        Storage::delete('public/foto_foto/' . $photo->foto);
        $photo->delete();
        // Diubah dari 'success' menjadi 'message'
        return redirect()->route('utama.galeri.show', $galeri->id)->with('message', 'Foto berhasil dihapus!');
    }
}
