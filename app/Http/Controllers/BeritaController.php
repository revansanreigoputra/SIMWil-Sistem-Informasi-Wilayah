<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

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

        // Proses Upload Gambar Manual ke asset/uploads/foto_berita
        $file = $request->file('fupload');
        $filename = $file->hashName();
        $destinationPath = public_path('asset/uploads/foto_berita');
        $file->move($destinationPath, $filename);
        // Mengikuti pola upload manual seperti KopTemplate

        $dataToStore = [
            'judul' => $validatedData['judul'],
            'slug' => Str::slug($validatedData['judul'], '-'),
            'isi_berita' => $validatedData['isi_berita'],
            'gambar' => $filename // Menyimpan nama file saja
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
            // Hapus gambar lama jika ada
            if ($berita->gambar) {
                $oldImagePath = public_path('asset/uploads/foto_berita/' . $berita->gambar);
                if (File::exists($oldImagePath)) {
                    File::delete($oldImagePath);
                }
            }

           // Upload gambar baru
            $file = $request->file('fupload');
            $filename = $file->hashName();
            $destinationPath = public_path('asset/uploads/foto_berita');
            $file->move($destinationPath, $filename);

            $dataToUpdate['gambar'] = $filename;
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
      // Hapus gambar dari folder asset/uploads/foto_berita
        if ($berita->gambar) {
            $imagePath = public_path('asset/uploads/foto_berita/' . $berita->gambar);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
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
