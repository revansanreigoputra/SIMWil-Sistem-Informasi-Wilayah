<?php

namespace App\Http\Controllers\PotensiKelembagaan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PotensiKelembagaan\LembagaKeamanan;
use App\Models\PotensiKelembagaan\PemilikOrganisasi;
// use App\Models\Desa; // <-- DIHAPUS, kita tidak perlu ambil semua desa
use Barryvdh\DomPDF\Facade\Pdf;

class LembagaKeamananController extends Controller
{
    // DIUBAH: Hanya tampilkan data milik desa yang login
    public function index()
    {
        $data = LembagaKeamanan::with(['pemilikOrganisasi', 'desa'])
            ->where('desa_id', auth()->user()->desa_id) // <-- DITAMBAHKAN
            ->latest()
            ->get();

        return view('pages.potensi.potensi-kelembagaan.keamanan.index', compact('data'));
    }

    // DIUBAH: Tidak perlu kirim data desa ke form
    public function create()
    {
        $pemilik = PemilikOrganisasi::all();
        // $desas = Desa::all(); // <-- DIHAPUS
        
        // Kirim hanya $pemilik
        return view('pages.potensi.potensi-kelembagaan.keamanan.create', compact('pemilik'));
    }

    // DIUBAH: Validasi desa_id dihapus, dan desa_id ditambahkan otomatis
    public function store(Request $request)
    {
        $request->validate([
            // 'desa_id' => 'required|exists:desas,id', // <-- DIHAPUS
            'tanggal' => 'required|date',
            'keberadaan_hansip_linmas' => 'nullable|in:Ada,Tidak Ada',
            'jumlah_hansip' => 'nullable|integer|min:0',
            'jumlah_satgas_linmas' => 'nullable|integer|min:0',
            'pelaksanaan_siskamling' => 'nullable|in:Ada,Tidak Ada',
            'jumlah_pos_kamling' => 'nullable|integer|min:0',
            'keberadaan_satpam_swakarsa' => 'nullable|in:Ada,Tidak Ada',
            'jumlah_anggota_satpam' => 'nullable|integer|min:0',
            'nama_organisasi_induk' => 'nullable|string|max:255',
            'pemilik_organisasi_id' => 'nullable|exists:pemilik_organisasi,id',
            'keberadaan_organisasi_lain' => 'nullable|in:Ada,Tidak Ada',
            'mitra_koramil_tni' => 'nullable|in:Ada,Tidak Ada',
            'jumlah_anggota_koramil_tni' => 'nullable|integer|min:0',
            'jumlah_kegiatan_koramil_tni' => 'nullable|integer|min:0',
            'babinkantibmas_polri' => 'nullable|in:Ada,Tidak Ada',
            'jumlah_anggota_babinkantibmas' => 'nullable|integer|min:0',
            'jumlah_kegiatan_babinkantibmas' => 'nullable|integer|min:0',
        ]);

        // Gabungkan data request dengan desa_id user
        $dataToCreate = $request->all();
        $dataToCreate['desa_id'] = auth()->user()->desa_id; // <-- DITAMBAHKAN

        LembagaKeamanan::create($dataToCreate);

        return redirect()->route('potensi.potensi-kelembagaan.keamanan.index')
            ->with('success', 'Data lembaga keamanan berhasil ditambahkan.');
    }

    // DIUBAH: Ambil data berdasarkan ID dan desa_id user
    public function edit($id)
    {
        $data = LembagaKeamanan::where('desa_id', auth()->user()->desa_id) // <-- DITAMBAHKAN
            ->findOrFail($id);
        
        $pemilik = PemilikOrganisasi::all();
        // $desas = Desa::all(); // <-- DIHAPUS

        return view('pages.potensi.potensi-kelembagaan.keamanan.edit', compact('data', 'pemilik'));
    }

    // DIUBAH: Validasi desa_id dihapus, pastikan update data milik user
    public function update(Request $request, $id)
    {
        $request->validate([
            // 'desa_id' => 'required|exists:desas,id', // <-- DIHAPUS
            'tanggal' => 'required|date',
            'keberadaan_hansip_linmas' => 'nullable|in:Ada,Tidak Ada',
            'jumlah_hansip' => 'nullable|integer|min:0',
            // ... (validasi lain tetap sama) ...
            'jumlah_kegiatan_babinkantibmas' => 'nullable|integer|min:0',
        ]);

        $data = LembagaKeamanan::where('desa_id', auth()->user()->desa_id) // <-- DITAMBAHKAN
            ->findOrFail($id);
        
        $dataToUpdate = $request->all();
        // Pastikan desa_id tidak ikut ter-update jika ada di request
        unset($dataToUpdate['desa_id']); 

        $data->update($dataToUpdate);

        return redirect()->route('potensi.potensi-kelembagaan.keamanan.index')
            ->with('success', 'Data lembaga keamanan berhasil diperbarui.');
    }

    // DIUBAH: Pastikan user hanya bisa hapus data miliknya
    public function destroy($id)
    {
        $data = LembagaKeamanan::where('desa_id', auth()->user()->desa_id) // <-- DITAMBAHKAN
            ->findOrFail($id);
        
        $data->delete();

        return redirect()->route('potensi.potensi-kelembagaan.keamanan.index')
            ->with('success', 'Data lembaga keamanan berhasil dihapus.');
    }

    // DIUBAH: Pastikan user hanya bisa lihat data miliknya
    public function show($id)
    {
        $data = LembagaKeamanan::with(['pemilikOrganisasi', 'desa'])
            ->where('desa_id', auth()->user()->desa_id) // <-- DITAMBAHKAN
            ->findOrFail($id);
        
        return view('pages.potensi.potensi-kelembagaan.keamanan.show', compact('data'));
    }

    // DIUBAH: Pastikan user hanya bisa print data miliknya
    public function print($id)
    {
        $data = LembagaKeamanan::with(['pemilikOrganisasi', 'desa'])
            ->where('desa_id', auth()->user()->desa_id) // <-- DITAMBAHKAN
            ->findOrFail($id);

        $pdf = Pdf::loadView('pages.potensi.potensi-kelembagaan.keamanan.print', compact('data'))
                 ->setPaper('a4', 'portrait');

        return $pdf->stream('Data_Lembaga_Keamanan_' . $data->id . '.pdf');
    }

    // DIUBAH: Pastikan user hanya bisa download data miliknya
    public function download($id)
    {
        $data = LembagaKeamanan::with(['pemilikOrganisasi', 'desa'])
            ->where('desa_id', auth()->user()->desa_id) // <-- DITAMBAHKAN
            ->findOrFail($id);

        $pdf = Pdf::loadView('pages.potensi.potensi-kelembagaan.keamanan.print', compact('data'))
                 ->setPaper('a4', 'portrait');

        return $pdf->download('Data_Lembaga_Keamanan_' . $data->id . '.pdf');
    }
}