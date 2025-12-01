<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File; // Ubah Storage menjadi File

class GaleriController extends Controller
{
    public function index()
    {
        $albums = Galeri::withCount('photos')->latest()->get();
        return view('pages.utama.galeri.index', compact('albums'));
    }

    public function store(Request $request)
    {
        // Validasi Album (Hanya nama album, tidak ada upload disini)
        $request->validateWithBag('storeAlbum', [
            'album' => 'required|string|max:255|unique:galeris,album',
        ]);

        Galeri::create(['album' => $request->album]);
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
        return redirect()->route('utama.galeri.index')->with('message', 'Nama album berhasil diperbarui!');
    }

    public function destroy(Galeri $galeri)
    {
        // Load relasi photos untuk menghapus file fisiknya
        $galeri->load('photos');

        // Loop setiap foto di dalam album ini
        foreach ($galeri->photos as $photo) {
            // Path: public/asset/uploads/foto_foto
            $imagePath = public_path('asset/uploads/foto_foto/' . $photo->foto);

            // Hapus file jika ada
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }

        // Hapus data album (foto di database akan terhapus otomatis jika ada cascade on delete,
        // tapi sebaiknya file fisik dihapus manual seperti di atas)
        $galeri->delete();

        return redirect()->route('utama.galeri.index')->with('message', 'Album dan seluruh fotonya berhasil dihapus!');
    }

    /*
    |--------------------------------------------------------------------------
    | FUNGSI UNTUK MANAJEMEN FOTO (UPLOAD FOTO KE DALAM ALBUM)
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
            // Tentukan path tujuan: public/asset/uploads/foto_foto
            $destinationPath = public_path('asset/uploads/foto_foto');

            foreach ($request->file('fupload') as $file) {
                // Buat nama file unik
                $filename = $file->hashName();

                // Pindahkan file secara manual
                $file->move($destinationPath, $filename);

                // Simpan ke database
                Photo::create([
                    'galeri_id' => $galeri->id,
                    'foto' => $filename
                ]);
            }
        }
        return redirect()->route('utama.galeri.show', $galeri->id)->with('message', 'Foto-foto baru berhasil diunggah!');
    }

    public function destroyPhoto(Galeri $galeri, Photo $photo)
    {
        if ($photo->galeri_id != $galeri->id) {
            abort(404);
        }

        // Hapus file fisik single photo
        $imagePath = public_path('asset/uploads/foto_foto/' . $photo->foto);

        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }

        $photo->delete();
        return redirect()->route('utama.galeri.show', $galeri->id)->with('message', 'Foto berhasil dihapus!');
    }
}
