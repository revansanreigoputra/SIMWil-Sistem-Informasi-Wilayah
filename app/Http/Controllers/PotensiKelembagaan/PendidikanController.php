<?php

namespace App\Http\Controllers\PotensiKelembagaan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PotensiKelembagaan\LembagaPendidikan;
use App\Models\MasterPotensi\KategoriSekolah;
use App\Models\MasterPotensi\JenisSekolahTingkatan;
use Barryvdh\DomPDF\Facade\Pdf;

class PendidikanController extends Controller
{
    public function index()
    {
        // Tampilkan data berdasarkan desa user aktif
        $data = LembagaPendidikan::with(['kategori', 'jenisSekolah'])
            ->where('desa_id', auth()->user()->desa_id) // <-- ditambahkan
            ->get();

        return view('pages.potensi.potensi-kelembagaan.pendidikan.index', compact('data'));
    }

    public function create()
    {
        $kategori = KategoriSekolah::all();
        $jenis = JenisSekolahTingkatan::all();

        return view('pages.potensi.potensi-kelembagaan.pendidikan.create', compact('kategori', 'jenis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'kategori_id' => 'required|exists:kategori_sekolah,id',
            'jenis_sekolah_id' => 'required|exists:jenis_sekolah_tingkatan,id',
            'status' => 'required|string',
            'jumlah_negeri' => 'nullable|integer|min:0',
            'jumlah_swasta' => 'nullable|integer|min:0',
            'jumlah_dimiliki_desa' => 'nullable|integer|min:0',
            'jumlah' => 'nullable|integer|min:0',
            'jumlah_pengajar' => 'nullable|integer|min:0',
        ]);

        LembagaPendidikan::create([
            'desa_id' => auth()->user()->desa_id, // <-- ditambahkan
            'tanggal' => $request->tanggal,
            'kategori_id' => $request->kategori_id,
            'jenis_sekolah_id' => $request->jenis_sekolah_id,
            'status' => $request->status,
            'jumlah_negeri' => $request->jumlah_negeri,
            'jumlah_swasta' => $request->jumlah_swasta,
            'jumlah_dimiliki_desa' => $request->jumlah_dimiliki_desa,
            'jumlah' => $request->jumlah,
            'jumlah_pengajar' => $request->jumlah_pengajar,
        ]);

        return redirect()->route('potensi.potensi-kelembagaan.pendidikan.index')
            ->with('success', 'Data lembaga pendidikan berhasil ditambahkan.');
    }

    public function show($id)
    {
        $data = LembagaPendidikan::with(['kategori', 'jenisSekolah'])
            ->where('desa_id', auth()->user()->desa_id) // keamanan data per desa
            ->findOrFail($id);

        return view('pages.potensi.potensi-kelembagaan.pendidikan.show', compact('data'));
    }

    public function edit($id)
    {
        $data = LembagaPendidikan::where('desa_id', auth()->user()->desa_id)
            ->findOrFail($id);

        $kategori = KategoriSekolah::all();
        $jenis = JenisSekolahTingkatan::all();

        return view('pages.potensi.potensi-kelembagaan.pendidikan.edit', compact('data', 'kategori', 'jenis'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'kategori_id' => 'required|exists:kategori_sekolah,id',
            'jenis_sekolah_id' => 'required|exists:jenis_sekolah_tingkatan,id',
            'status' => 'required|string',
            'jumlah_negeri' => 'nullable|integer|min:0',
            'jumlah_swasta' => 'nullable|integer|min:0',
            'jumlah_dimiliki_desa' => 'nullable|integer|min:0',
            'jumlah' => 'nullable|integer|min:0',
            'jumlah_pengajar' => 'nullable|integer|min:0',
        ]);

        $data = LembagaPendidikan::where('desa_id', auth()->user()->desa_id)
            ->findOrFail($id);

        $data->update([
            'tanggal' => $request->tanggal,
            'kategori_id' => $request->kategori_id,
            'jenis_sekolah_id' => $request->jenis_sekolah_id,
            'status' => $request->status,
            'jumlah_negeri' => $request->jumlah_negeri,
            'jumlah_swasta' => $request->jumlah_swasta,
            'jumlah_dimiliki_desa' => $request->jumlah_dimiliki_desa,
            'jumlah' => $request->jumlah,
            'jumlah_pengajar' => $request->jumlah_pengajar,
        ]);

        return redirect()->route('potensi.potensi-kelembagaan.pendidikan.index')
            ->with('success', 'Data lembaga pendidikan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $data = LembagaPendidikan::where('desa_id', auth()->user()->desa_id)
            ->findOrFail($id);

        $data->delete();

        return redirect()->route('potensi.potensi-kelembagaan.pendidikan.index')
            ->with('success', 'Data lembaga pendidikan berhasil dihapus.');
    }

    public function getJenis($kategoriId)
    {
        $jenis = JenisSekolahTingkatan::where('kategori_sekolah_id', $kategoriId)->get();
        return response()->json($jenis);
    }

    public function print($id)
    {
        $data = LembagaPendidikan::where('desa_id', auth()->user()->desa_id)
            ->with(['kategori', 'jenisSekolah'])
            ->findOrFail($id);

        $pdf = Pdf::loadView('pages.potensi.potensi-kelembagaan.pendidikan.print', compact('data'))
                  ->setPaper('a4', 'portrait');

        return $pdf->stream('Data_Pendidikan_' . $data->id . '.pdf');
    }

    public function download($id)
    {
        $data = LembagaPendidikan::where('desa_id', auth()->user()->desa_id)
            ->with(['kategori', 'jenisSekolah'])
            ->findOrFail($id);

        $pdf = Pdf::loadView('pages.potensi.potensi-kelembagaan.pendidikan.print', compact('data'))
                  ->setPaper('a4', 'portrait');

        return $pdf->download('Data_Pendidikan_' . $data->id . '.pdf');
    }
}
