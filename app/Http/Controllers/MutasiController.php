<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mutasi;
use Illuminate\Support\Facades\Auth;

class MutasiController extends Controller
{
    // Mutasi Data
    public function indexData()
    {
         // Ambil data mutasi data dari database melalui Model
        $mutasiDatas = Mutasi::whereIn('jenis', ['pindah','meninggal','pendatang' ])->latest()->paginate(10);
        
        return view('pages.mutasi.data.index', compact('mutasiDatas'));
    }

    public function createData()
    {
        return view('pages.mutasi.data.create');
    }

    public function storeData(Request $request)
    {
        $validatedData = $request->validate([
        'nik'       => 'required|string|size:16', // Contoh: NIK harus 16 digit
        'nomor'     => 'required|string|max:255|unique:mutasi,nomor', // Nomor surat harus unik
        'tanggal'   => 'required|date',
        'jenis' => 'required|in:pendatang,pindah,meninggal',
        'penyebab' => 'nullable|string|max:255',
        'kecamatan' => 'required|string|max:255',
        'desa'      => 'required|string|max:255',
    ]);
    $validatedData['user_id'] = Auth::id();
    Mutasi::create($validatedData);
    return redirect()->route('mutasi.data.index')
                    ->with('success', 'Data mutasi berhasil ditambahkan.');
    }

    public function editData($id)
    {
        $mutasi = Mutasi::findOrFail($id);
        return view('pages.mutasi.data.edit', compact('mutasi'));
    }

    public function updateData(Request $request, $id)
    {
         $validated = $request->validate([
        'nik' => 'required|string|size:16',
        'nomor' => "required|string|max:255|unique:mutasi,nomor,$id",
        'tanggal' => 'required|date',
        'jenis' => 'required|in:pendatang,pindah,meninggal',
        'penyebab' => 'nullable|string|max:255',
        'kecamatan' => 'required|string|max:255',
        'desa' => 'required|string|max:255',
    ]);

    $mutasi = Mutasi::findOrFail($id);
    $mutasi->update($validated);

    return redirect()->route('mutasi.data.index')
                     ->with('success', 'Data mutasi berhasil diperbarui.');
    }

    public function destroyData($id)
    {
        $mutasi = Mutasi::findOrFail($id);
        $mutasi->delete();
        return redirect()->route('mutasi.data.index')
                     ->with('success', 'Data mutasi berhasil dihapus.');
    }
    public function showData($id)
    {
        $mutasi = Mutasi::findOrFail($id);
        return view('pages.mutasi.data.show', compact('mutasi'));
    }


    // // Mutasi Masuk
    // public function indexMasuk()
    // {
    //     $mutasiMasuks = Mutasi::where('jenis', 'masuk')->paginate(10);
    //     return view('pages.mutasi.masuk.index', compact('mutasiMasuks'));
    // }

    // public function createMasuk()
    // {
    //     return view('pages.mutasi.masuk.create');
    // }

    // public function storeMasuk(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'nik'       => 'required|string|size:16',
    //         'nomor'     => 'required|string|max:255|unique:mutasis,nomor',
    //         'tanggal'   => 'required|date',
    //         'jenis'     => 'required|string',
    //         'penyebab'  => 'nullable|string|max:255',
    //         'kecamatan' => 'required|string|max:255',
    //         'desa'      => 'required|string|max:255',
    //     ]);

    //     Mutasi::create($validatedData);

    //     return redirect()->route('mutasi.masuk.index')
    //                      ->with('success', 'Data mutasi masuk berhasil ditambahkan.');
    // }

    // public function editMasuk($id)
    // {
    //     $mutasi = Mutasi::findOrFail($id);
    //     return view('pages.mutasi.masuk.edit', compact('mutasi'));
    // }

    // public function updateMasuk(Request $request, $id)
    // {
    //     $validatedData = $request->validate([
    //         'nik'       => 'required|string|size:16',
    //         'nomor'     => "required|string|max:255|unique:mutasis,nomor,$id",
    //         'tanggal'   => 'required|date',
    //         'jenis'     => 'required|string',
    //         'penyebab'  => 'nullable|string|max:255',
    //         'kecamatan' => 'required|string|max:255',
    //         'desa'      => 'required|string|max:255',
    //     ]);

    //     $mutasi = Mutasi::findOrFail($id);
    //     $mutasi->update($validatedData);

    //     return redirect()->route('mutasi.masuk.index')
    //                      ->with('success', 'Data mutasi masuk berhasil diperbarui.');
    // }

    // public function destroyMasuk($id)
    // {
    //     $mutasi = Mutasi::findOrFail($id);
    //     $mutasi->delete();

    //     return redirect()->route('mutasi.masuk.index')
    //                      ->with('success', 'Data mutasi masuk berhasil dihapus.');
    // }

    // public function showMasuk($id)
    // {
    //     $mutasi = Mutasi::findOrFail($id);
    //     return view('pages.mutasi.masuk.show', compact('mutasi'));
    // }

    // Laporan Mutasi
    public function laporan()
    {
        return view('pages.mutasi.laporan');
    }

    public function exportLaporan()
    {
        // logika export
    }
}
