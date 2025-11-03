<?php

namespace App\Http\Controllers;

use App\Models\IklimTanahErosi;
use Illuminate\Http\Request;

class IklimTanahErosiController extends Controller
{
    public function index()
    {
        $desaId = session('desa_id');
        $iklims = IklimTanahErosi::with('desa')->where('desa_id', $desaId)->latest()->get();
        return view('pages.potensi.sda.iklim.index', compact('iklims'));
    }

    public function create()
    {
        return view('pages.potensi.sda.iklim.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'curah_hujan' => 'required|numeric|min:0',
            'jumlah_bulan_hujan' => 'required|integer|min:0',
            'kelembapan_udara' => 'required|numeric|min:0',
            'suhu_rata_rata' => 'required|numeric|min:0',
            'tinggi_permukaan_laut' => 'required|numeric|min:0',
            'warna_tanah' => 'required|in:kuning,hitam,abu-abu,merah',
            'tekstur_tanah' => 'required|in:pasiran,debulan,lempungan',
            'kemiringan_tanah' => 'required|numeric|min:0',
            'lahan_kritis' => 'required|numeric|min:0',
            'lahan_terlantar' => 'required|numeric|min:0',
            'tanah_erosi_ringan' => 'required|numeric|min:0',
            'tanah_erosi_sedang' => 'required|numeric|min:0',
            'tanah_erosi_berat' => 'required|numeric|min:0',
            'tanah_tidak_ada_erosi' => 'required|numeric|min:0',
        ]);

        $data = $request->all();
        $data['desa_id'] = session('desa_id');

        IklimTanahErosi::create($data);

        return redirect()->route('iklim.index')->with('success', 'Data iklim, tanah, dan erosi berhasil ditambahkan.');
    }

    public function show(IklimTanahErosi $iklim)
    {
        return view('pages.potensi.sda.iklim.show', compact('iklim'));
    }

    public function edit(IklimTanahErosi $iklim)
    {
        return view('pages.potensi.sda.iklim.edit', compact('iklim'));
    }

    public function update(Request $request, IklimTanahErosi $iklim)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'curah_hujan' => 'required|numeric|min:0',
            'jumlah_bulan_hujan' => 'required|integer|min:0',
            'kelembapan_udara' => 'required|numeric|min:0',
            'suhu_rata_rata' => 'required|numeric|min:0',
            'tinggi_permukaan_laut' => 'required|numeric|min:0',
            'warna_tanah' => 'required|in:kuning,hitam,abu-abu,merah',
            'tekstur_tanah' => 'required|in:pasiran,debulan,lempungan',
            'kemiringan_tanah' => 'required|numeric|min:0',
            'lahan_kritis' => 'required|numeric|min:0',
            'lahan_terlantar' => 'required|numeric|min:0',
            'tanah_erosi_ringan' => 'required|numeric|min:0',
            'tanah_erosi_sedang' => 'required|numeric|min:0',
            'tanah_erosi_berat' => 'required|numeric|min:0',
            'tanah_tidak_ada_erosi' => 'required|numeric|min:0',
        ]);

        $iklim->update($request->all());

        return redirect()->route('iklim.index')->with('success', 'Data iklim, tanah, dan erosi berhasil diubah.');
    }

    public function destroy(IklimTanahErosi $iklim)
    {
        $iklim->delete();
        return redirect()->route('iklim.index')->with('success', 'Data iklim, tanah, dan erosi berhasil dihapus.');
    }
}