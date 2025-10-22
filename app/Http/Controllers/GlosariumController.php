<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Glosarium; // Import model Glosarium
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class GlosariumController extends Controller
{
    /**
     * Tampilkan daftar glosarium dari database.
     */
    public function index()
    {
        // Ambil semua data dari tabel glosarium, diurutkan dari yang terbaru
        $glosarium = Glosarium::latest()->get();
        return view('pages.utama.glosarium.index', compact('glosarium'));
    }

    /**
     * Simpan data glosarium baru ke database.
     */
    public function store(Request $request)
    {
        // Validasi data yang masuk
        $request->validate([
            'istilah' => 'required|string|max:255|unique:glosarium,istilah',
            'deskripsi' => 'required|string',
        ]);

        // Buat data baru
        Glosarium::create($request->all());

        // Redirect kembali dengan pesan sukses
        return redirect()->route('utama.glosarium.index')
            ->with('message', 'Istilah baru berhasil ditambahkan.');
    }

    /**
     * Perbarui data glosarium yang ada di database.
     */
    public function update(Request $request, Glosarium $glosarium)
    {
        // Validasi data yang masuk
        $request->validate([
            // Pastikan istilah unik, kecuali untuk dirinya sendiri
            'istilah' => 'required|string|max:255|unique:glosarium,istilah,' . $glosarium->id,
            'deskripsi' => 'required|string',
        ]);

        // Update data
        $glosarium->update($request->all());

        // Redirect kembali dengan pesan sukses
        return redirect()->route('utama.glosarium.index')
            ->with('message', 'Istilah berhasil diperbarui.');
    }

    /**
     * Hapus data glosarium dari database.
     */
    public function destroy(Glosarium $glosarium)
    {
        // Hapus data
        $glosarium->delete();

        // Redirect kembali dengan pesan sukses
        return redirect()->route('utama.glosarium.index')
            ->with('message', 'Istilah berhasil dihapus.');
    }
    public function cetak()
    {
        // 1. Ambil semua data glosarium
        $glosarium = Glosarium::all();

        // 2. Load view untuk PDF dan kirim data ke dalamnya
        //    (Pastikan Anda sudah membuat file view di langkah selanjutnya)
        $pdf = PDF::loadView('pages.utama.glosarium.cetak', compact('glosarium'));

        // 3. Atur orientasi kertas dan nama file
        $pdf->setPaper('a4', 'portrait');

        // 4. Tampilkan PDF di browser dengan nama file 'laporan-glosarium.pdf'
        return $pdf->stream('laporan-glosarium.pdf');
    }
}

