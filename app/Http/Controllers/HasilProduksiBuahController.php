<?php

namespace App\Http\Controllers;

use App\Models\HasilProduksiBuah;
use App\Models\MasterPerkembangan\KomoditasBuah;
use Illuminate\Http\Request;

class HasilProduksiBuahController extends Controller
{
    public function index()
    {
        $desaId = session('desa_id');
        $hasilProduksiBuahs = HasilProduksiBuah::with('desa', 'komoditas')
            ->where('desa_id', $desaId)
            ->latest()
            ->get();

        return view('pages.potensi.sda.hasilbuah.index', compact('hasilProduksiBuahs'));
    }

    public function create()
    {
        $komoditasBuahs = KomoditasBuah::all();
        return view('pages.potensi.sda.hasilbuah.create', compact('komoditasBuahs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'komoditas_buah_id' => 'required|exists:komoditas_buahs,id',
            'luas_produksi' => 'required|numeric|min:0',
            'hasil_produksi' => 'required|numeric|min:0',
            'dijual_langsung_konsumen' => 'required|in:Ya,Tidak',
            'dijual_ke_pasar' => 'required|in:Ya,Tidak',
            'dijual_melalui_kud' => 'required|in:Ya,Tidak',
            'dijual_melalui_tengkulak' => 'required|in:Ya,Tidak',
            'dijual_melalui_pengecer' => 'required|in:Ya,Tidak',
            'dijual_ke_lumbung_desa' => 'required|in:Ya,Tidak',
            'tidak_dijual' => 'required|in:Ya,Tidak',
        ]);

        $data = $request->all();
        $data['desa_id'] = session('desa_id');

        HasilProduksiBuah::create($data);

        return redirect()->route('hasilbuah.index')->with('success', 'Data hasil produksi buah berhasil ditambahkan.');
    }

    public function show(HasilProduksiBuah $hasilbuah)
    {
        if ($hasilbuah->desa_id != session('desa_id')) {
            abort(403, 'Anda tidak memiliki akses ke data ini.');
        }
        return view('pages.potensi.sda.hasilbuah.show', compact('hasilbuah'));
    }

    public function edit(HasilProduksiBuah $hasilbuah)
    {
        if ($hasilbuah->desa_id != session('desa_id')) {
            abort(403, 'Anda tidak memiliki akses ke data ini.');
        }
        $komoditasBuahs = KomoditasBuah::all();
        return view('pages.potensi.sda.hasilbuah.edit', compact('hasilbuah', 'komoditasBuahs'));
    }

    public function update(Request $request, HasilProduksiBuah $hasilbuah)
    {
        if ($hasilbuah->desa_id != session('desa_id')) {
            abort(403, 'Anda tidak memiliki akses ke data ini.');
        }

        $request->validate([
            'tanggal' => 'required|date',
            'komoditas_buah_id' => 'required|exists:komoditas_buahs,id',
            'luas_produksi' => 'required|numeric|min:0',
            'hasil_produksi' => 'required|numeric|min:0',
            'dijual_langsung_konsumen' => 'required|in:Ya,Tidak',
            'dijual_ke_pasar' => 'required|in:Ya,Tidak',
            'dijual_melalui_kud' => 'required|in:Ya,Tidak',
            'dijual_melalui_tengkulak' => 'required|in:Ya,Tidak',
            'dijual_melalui_pengecer' => 'required|in:Ya,Tidak',
            'dijual_ke_lumbung_desa' => 'required|in:Ya,Tidak',
            'tidak_dijual' => 'required|in:Ya,Tidak',
        ]);

        $hasilbuah->update($request->all());

        return redirect()->route('hasilbuah.index')->with('success', 'Data hasil produksi buah berhasil diubah.');
    }

    public function destroy(HasilProduksiBuah $hasilbuah)
    {
        if ($hasilbuah->desa_id != session('desa_id')) {
            abort(403, 'Anda tidak memiliki akses ke data ini.');
        }
        
        $hasilbuah->delete();
        return redirect()->route('hasilbuah.index')->with('success', 'Data hasil produksi buah berhasil dihapus.');
    }
}