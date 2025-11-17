<?php

namespace App\Http\Controllers;

use App\Models\SektorIndustriPengolahan;
use App\Models\Desa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SektorIndustriPengolahanController extends Controller
{
    public function index()
    {
        $desaId = session('desa_id');

        $sektors = SektorIndustriPengolahan::with('desa')
            ->where('desa_id', $desaId)
            ->latest()
            ->paginate(10);

        return view('pages.perkembangan.produk-domestik.sektor-industri-pengolahan.index', compact('sektors'));
    }

    public function create()
    {
        // Tidak perlu kirim desas karena desa_id diambil dari session
        return view('pages.perkembangan.produk-domestik.sektor-industri-pengolahan.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'jenis_industri' => 'required|string|max:255',
            'nilai_produksi' => 'required|integer|min:0',
            'nilai_bahan_baku' => 'required|integer|min:0',
            'nilai_bahan_penolong' => 'required|integer|min:0',
            'biaya_antara' => 'required|integer|min:0',
            'jumlah_jenis_industri' => 'required|integer|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Gagal menambahkan data sektor industri pengolahan.');
        }

        $data = $request->all();
        $data['desa_id'] = session('desa_id');

        SektorIndustriPengolahan::create($data);

        return redirect()
            ->route('perkembangan.produk-domestik.sektor-industri-pengolahan.index')
            ->with('success', 'Data berhasil ditambahkan.');
    }
    
public function edit($id)
{
    $sektorIndustriPengolahan = SektorIndustriPengolahan::findOrFail($id);
    return view('pages.perkembangan.produk-domestik.sektor-industri-pengolahan.edit', compact('sektorIndustriPengolahan'));
}

  public function update(Request $request, SektorIndustriPengolahan $sektor_industri_pengolahan)
{
    $validator = Validator::make($request->all(), [
        'tanggal' => 'required|date',
        'jenis_industri' => 'required|string|max:255',
        'nilai_produksi' => 'required|integer|min:0',
        'nilai_bahan_baku' => 'required|integer|min:0',
        'nilai_bahan_penolong' => 'required|integer|min:0',
        'biaya_antara' => 'required|integer|min:0',
        'jumlah_jenis_industri' => 'required|integer|min:0',
    ]);

    if ($validator->fails()) {
        return redirect()->back()
            ->withErrors($validator)
            ->withInput()
            ->with('error', 'Gagal memperbarui data sektor industri pengolahan.');
    }

    $data = $request->all();
    $data['desa_id'] = session('desa_id');

    $sektor_industri_pengolahan->update($data);

    return redirect()
        ->route('perkembangan.produk-domestik.sektor-industri-pengolahan.index')
        ->with('success', 'Data berhasil diperbarui.');
}



    public function show($id)
{
    $sektor = \App\Models\SektorIndustriPengolahan::with('desa')->findOrFail($id);
    return view('pages.perkembangan.produk-domestik.sektor-industri-pengolahan.show', compact('sektor'));
}


    public function destroy(SektorIndustriPengolahan $sektor_industri_pengolahan)
{
    $sektor_industri_pengolahan->delete();

    return redirect()
        ->route('perkembangan.produk-domestik.sektor-industri-pengolahan.index')
        ->with('success', 'Data berhasil dihapus.');
}

}
