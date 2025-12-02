<?php

namespace App\Http\Controllers\PotensiKelembagaan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PotensiKelembagaan\Hiburan;
use App\Models\MasterPotensi\KategoriUsahaJasaDanHiburan;
use App\Models\MasterPotensi\JenisUsahaHiburan;
use Barryvdh\DomPDF\Facade\Pdf;

class HiburanController extends Controller
{
    /**
     * Menampilkan daftar usaha hiburan berdasarkan desa user
     */
    public function index()
    {
        $hiburan = Hiburan::with(['kategori', 'jenisUsaha'])
            ->where('desa_id', auth()->user()->desa_id)
            ->latest()
            ->get();

        return view('pages.potensi.potensi-kelembagaan.hiburan.index', compact('hiburan'));
    }

    /**
     * Menampilkan detail usaha hiburan
     */
    public function show($id)
    {
        $hiburan = Hiburan::with(['kategori', 'jenisUsaha'])
            ->where('desa_id', auth()->user()->desa_id)
            ->findOrFail($id);

        return view('pages.potensi.potensi-kelembagaan.hiburan.show', compact('hiburan'));
    }

    /**
     * Form tambah data
     */
    public function create()
    {
        $kategori = KategoriUsahaJasaDanHiburan::all();
        $jenisUsaha = JenisUsahaHiburan::all();
        return view('pages.potensi.potensi-kelembagaan.hiburan.create', compact('kategori', 'jenisUsaha'));
    }

    /**
     * Simpan data baru + desa_id
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'kategori_id' => 'required|exists:kategori_usaha_jasa_dan_hiburan,id',
            'jenis_usaha_id' => 'required|exists:jenis_usaha_hiburan,id',
            'jumlah_unit' => 'required|integer|min:0',
            'jenis_produk' => 'required|integer|min:0',
            'jumlah_tenaga_kerja' => 'required|integer|min:0',
        ]);

        Hiburan::create([
            'tanggal' => $request->tanggal,
            'kategori_id' => $request->kategori_id,
            'jenis_usaha_id' => $request->jenis_usaha_id,
            'jumlah_unit' => $request->jumlah_unit,
            'jenis_produk' => $request->jenis_produk,
            'jumlah_tenaga_kerja' => $request->jumlah_tenaga_kerja,
            'desa_id' => auth()->user()->desa_id, // ← DITAMBAHKAN
        ]);

        return redirect()->route('potensi.potensi-kelembagaan.hiburan.index')
                         ->with('success', 'Data usaha hiburan berhasil ditambahkan!');
    }

    /**
     * Form edit data
     */
    public function edit($id)
    {
        $hiburan = Hiburan::where('desa_id', auth()->user()->desa_id)->findOrFail($id);

        $kategori = KategoriUsahaJasaDanHiburan::all();
        $jenisUsaha = JenisUsahaHiburan::all();
        return view('pages.potensi.potensi-kelembagaan.hiburan.edit', compact('hiburan', 'kategori', 'jenisUsaha'));
    }

    /**
     * Update data + tetap mempertahankan desa_id
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'kategori_id' => 'required|exists:kategori_usaha_jasa_dan_hiburan,id',
            'jenis_usaha_id' => 'required|exists:jenis_usaha_hiburan,id',
            'jumlah_unit' => 'required|integer|min:0',
            'jenis_produk' => 'required|integer|min:0',
            'jumlah_tenaga_kerja' => 'required|integer|min:0',
        ]);

        $hiburan = Hiburan::where('desa_id', auth()->user()->desa_id)->findOrFail($id);

        $hiburan->update([
            'tanggal' => $request->tanggal,
            'kategori_id' => $request->kategori_id,
            'jenis_usaha_id' => $request->jenis_usaha_id,
            'jumlah_unit' => $request->jumlah_unit,
            'jenis_produk' => $request->jenis_produk,
            'jumlah_tenaga_kerja' => $request->jumlah_tenaga_kerja,
            // desa_id TIDAK diubah karena harus tetap milik desa user
        ]);

        return redirect()->route('potensi.potensi-kelembagaan.hiburan.index')
                         ->with('success', 'Data usaha hiburan berhasil diperbarui!');
    }

    /**
     * Hapus data
     */
    public function destroy($id)
    {
        $hiburan = Hiburan::where('desa_id', auth()->user()->desa_id)->findOrFail($id);
        $hiburan->delete();

        return redirect()->route('potensi.potensi-kelembagaan.hiburan.index')
                         ->with('success', 'Data usaha hiburan berhasil dihapus!');
    }

    public function print($id)
    {
        $hiburan = Hiburan::with(['kategori', 'jenisUsaha'])
            ->where('desa_id', auth()->user()->desa_id)
            ->findOrFail($id);

        $pdf = Pdf::loadView('pages.potensi.potensi-kelembagaan.hiburan.print', compact('hiburan'))
              ->setPaper('a4', 'portrait');
        return $pdf->stream('Data_Hiburan_' . $hiburan->id . '.pdf');
    }

    public function download($id)
    {
        $hiburan = Hiburan::with(['kategori', 'jenisUsaha'])
            ->where('desa_id', auth()->user()->desa_id)
            ->findOrFail($id);

        $pdf = Pdf::loadView('pages.potensi.potensi-kelembagaan.hiburan.print', compact('hiburan'))
              ->setPaper('a4', 'portrait');
        return $pdf->download('Data_Hiburan_' . $hiburan->id . '.pdf');
    }

    public function getJenis($kategoriId)
    {
        $data = JenisUsahaHiburan::where('kategori_id', $kategoriId)->get(['id', 'nama']);
        return response()->json($data);
    }
}
