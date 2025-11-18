<?php

namespace App\Http\Controllers;

use App\Models\DepositProduksiGalian;
use App\Models\MasterPerkembangan\KomoditasGalian;
use App\Models\Desa;
use Illuminate\Http\Request;

class DepositProduksiGalianController extends Controller
{
    public function index()
    {
        $desaId = session('desa_id');
        $depositProduksiGalians = DepositProduksiGalian::with(['desa', 'komoditasGalian'])
            ->where('desa_id', $desaId)
            ->latest()
            ->get();
        return view('pages.potensi.sda.deposit-produksi-galian.index', compact('depositProduksiGalians'));
    }

    public function create()
    {
        $komoditasGalians = KomoditasGalian::all();
        return view('pages.potensi.sda.deposit-produksi-galian.create', compact('komoditasGalians'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'komoditas_galian_id' => 'required|exists:komoditas_galians,id',
            'status' => 'required|in:ada tapi belum produktif,ada dan sudah produktif',
            'hasil_produksi' => 'required|in:kecil,sedang,besar',
            'dijual_langsung_ke_konsumen' => 'required|in:ya,tidak',
            'dijual_melalui_kud' => 'required|in:ya,tidak',
            'dijual_melalui_tengkulak' => 'required|in:ya,tidak',
            'dijual_melalui_pengecer' => 'required|in:ya,tidak',
            'dijual_ke_perusahaan' => 'required|in:ya,tidak',
            'dijual_ke_lumbung_desa_kelurahan' => 'required|in:ya,tidak',
            'tidak_dijual' => 'required|in:ya,tidak',
            'kepemilikan' => 'required|in:pemerintah,swasta,perorangan,adat,lainnya',
        ]);

        $data = $request->all();
        $data['desa_id'] = session('desa_id');

        DepositProduksiGalian::create($data);

        return redirect()->route('deposit-produksi-galian.index')->with('success', 'Data deposit produksi galian berhasil ditambahkan.');
    }

    public function show(DepositProduksiGalian $depositProduksiGalian)
    {
        return view('pages.potensi.sda.deposit-produksi-galian.show', compact('depositProduksiGalian'));
    }

    public function edit(DepositProduksiGalian $depositProduksiGalian)
    {
        $komoditasGalians = KomoditasGalian::all();
        return view('pages.potensi.sda.deposit-produksi-galian.edit', compact('depositProduksiGalian', 'komoditasGalians'));
    }

    public function update(Request $request, DepositProduksiGalian $depositProduksiGalian)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'komoditas_galian_id' => 'required|exists:komoditas_galians,id',
            'status' => 'required|in:ada tapi belum produktif,ada dan sudah produktif',
            'hasil_produksi' => 'required|in:kecil,sedang,besar',
            'dijual_langsung_ke_konsumen' => 'required|in:ya,tidak',
            'dijual_melalui_kud' => 'required|in:ya,tidak',
            'dijual_melalui_tengkulak' => 'required|in:ya,tidak',
            'dijual_melalui_pengecer' => 'required|in:ya,tidak',
            'dijual_ke_perusahaan' => 'required|in:ya,tidak',
            'dijual_ke_lumbung_desa_kelurahan' => 'required|in:ya,tidak',
            'tidak_dijual' => 'required|in:ya,tidak',
            'kepemilikan' => 'required|in:pemerintah,swasta,perorangan,adat,lainnya',
        ]);

        $depositProduksiGalian->update($request->all());

        return redirect()->route('deposit-produksi-galian.index')->with('success', 'Data deposit produksi galian berhasil diubah.');
    }

    public function destroy(DepositProduksiGalian $depositProduksiGalian)
    {
        $depositProduksiGalian->delete();
        return redirect()->route('deposit-produksi-galian.index')->with('success', 'Data deposit produksi galian berhasil dihapus.');
    }
}
