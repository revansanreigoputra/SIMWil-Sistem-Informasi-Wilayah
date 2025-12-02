<?php

namespace App\Http\Controllers\PotensiKelembagaan;

use App\Http\Controllers\Controller;
use App\Models\PotensiKelembagaan\LembagaAdat;
// use App\Models\Desa; // <-- DIHAPUS, tidak perlu lagi
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade\Pdf;

class LembagaAdatController extends Controller
{
    // DIUBAH: Hanya tampilkan data milik desa yang login
    public function index()
    {
        $lembagaAdats = LembagaAdat::with('desa')
            ->where('desa_id', auth()->user()->desa_id) // <-- DITAMBAHKAN
            ->orderBy('tanggal', 'desc')
            ->paginate(10);

        return view(
            'pages.potensi.potensi-kelembagaan.lembagaAdat.index',
            compact('lembagaAdats')
        );
    }

    // DIUBAH: Tidak perlu kirim data desa
    public function create()
    {
        // $desas = Desa::all(); // <-- DIHAPUS
        return view('pages.potensi.potensi-kelembagaan.lembagaAdat.create');
    }

    // DIUBAH: Validasi desa_id dihapus, dan desa_id ditambahkan otomatis
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // 'desa_id' => 'required|exists:desas,id', // <-- DIHAPUS
            'tanggal' => 'required|date',
            'pemangku_adat' => 'nullable|boolean',
            'kepengurusan_adat' => 'nullable|boolean',
            'rumah_adat' => 'nullable|boolean',
            // ... (validasi lainnya tetap sama) ...
            'upacara_adat_penyelesaian_masalah' => 'nullable|boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Gabungkan data request dengan desa_id user
        $dataToCreate = $request->all();
        $dataToCreate['desa_id'] = auth()->user()->desa_id; // <-- DITAMBAHKAN

        LembagaAdat::create($dataToCreate);

        return redirect()->route('potensi.potensi-kelembagaan.lembagaAdat.index')
            ->with('success', 'Data Lembaga Adat berhasil ditambahkan.');
    }

    // DIUBAH: Ambil data berdasarkan ID dan desa_id user
    public function show($id) // Diubah dari (LembagaAdat $adat)
    {
        $adat = LembagaAdat::with('desa')
            ->where('desa_id', auth()->user()->desa_id) // <-- DITAMBAHKAN
            ->findOrFail($id);

        return view(
            'pages.potensi.potensi-kelembagaan.lembagaAdat.show',
            compact('adat')
        );
    }

    // DIUBAH: Ambil data berdasarkan ID dan desa_id user
    public function edit($id) // Diubah dari (LembagaAdat $adat)
    {
        $adat = LembagaAdat::where('desa_id', auth()->user()->desa_id) // <-- DITAMBAHKAN
            ->findOrFail($id);
        
        // $desas = Desa::all(); // <-- DIHAPUS
        return view(
            'pages.potensi.potensi-kelembagaan.lembagaAdat.edit',
            compact('adat')
        );
    }

    // DIUBAH: Validasi desa_id dihapus, pastikan update data milik user
    public function update(Request $request, $id) // Diubah dari (LembagaAdat $adat)
    {
        $validator = Validator::make($request->all(), [
            // 'desa_id' => 'required|exists:desas,id', // <-- DIHAPUS
            'tanggal' => 'required|date',
            // ... (validasi lainnya tetap sama) ...
            'upacara_adat_penyelesaian_masalah' => 'nullable|boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $adat = LembagaAdat::where('desa_id', auth()->user()->desa_id) // <-- DITAMBAHKAN
            ->findOrFail($id);
        
        $dataToUpdate = $request->all();
        unset($dataToUpdate['desa_id']); // Hapus desa_id dari request agar tidak menimpa

        $adat->update($dataToUpdate);

        return redirect()->route('potensi.potensi-kelembagaan.lembagaAdat.index')
            ->with('success', 'Data Lembaga Adat berhasil diperbarui.');
    }

    // DIUBAH: Pastikan user hanya bisa hapus data miliknya
    public function destroy($id) // Diubah dari (LembagaAdat $adat)
    {
        $adat = LembagaAdat::where('desa_id', auth()->user()->desa_id) // <-- DITAMBAHKAN
            ->findOrFail($id);
        
        $adat->delete();

        return redirect()->route('potensi.potensi-kelembagaan.lembagaAdat.index')
            ->with('success', 'Data Lembaga Adat berhasil dihapus.');
    }

    // DIUBAH: Pastikan user hanya bisa print data miliknya
    public function print($id)
    {
        $data = LembagaAdat::with('desa')
            ->where('desa_id', auth()->user()->desa_id) // <-- DITAMBAHKAN
            ->findOrFail($id);

        $pdf = Pdf::loadView(
            'pages.potensi.potensi-kelembagaan.lembagaAdat.print',
            compact('data')
        )->setPaper('a4', 'portrait');

        return $pdf->stream('Data_Lembaga_Adat_' . $data->id . '.pdf');
    }

    // DIUBAH: Pastikan user hanya bisa download data miliknya
    public function download($id)
    {
        $data = LembagaAdat::with('desa')
            ->where('desa_id', auth()->user()->desa_id) // <-- DITAMBAHKAN
            ->findOrFail($id);

        $pdf = Pdf::loadView(
            'pages.potensi.potensi-kelembagaan.lembagaAdat.print',
            compact('data')
        )->setPaper('a4', 'portrait');

        return $pdf->download('Data_Lembaga_Adat_' . $data->id . '.pdf');
    }
}