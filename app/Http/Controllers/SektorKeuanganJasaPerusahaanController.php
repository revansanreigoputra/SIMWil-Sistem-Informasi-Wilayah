<?php

namespace App\Http\Controllers;

use App\Models\SektorKeuanganJasaPerusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SektorKeuanganJasaPerusahaanController extends Controller
{
    public function index()
    {
        $desaId = session('desa_id');
        $data = SektorKeuanganJasaPerusahaan::with('desa')
                    ->where('desa_id', $desaId)
                    ->latest()
                    ->paginate(10);

        return view('pages.perkembangan.produk-domestik.sektor-keuangan-jasa-perusahaan.index', compact('data'));
    }

    public function create()
    {
        return view('pages.perkembangan.produk-domestik.sektor-keuangan-jasa-perusahaan.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput()->with('error', 'Gagal menambahkan data.');
        }

        $data = $request->all();
        $data['desa_id'] = session('desa_id');
        SektorKeuanganJasaPerusahaan::create($data);

        return redirect()->route('perkembangan.produk-domestik.sektor-keuangan-jasa-perusahaan.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function show($id)
    {
        $data = SektorKeuanganJasaPerusahaan::with('desa')->findOrFail($id);
        return view('pages.perkembangan.produk-domestik.sektor-keuangan-jasa-perusahaan.show', compact('data'));
    }

    public function edit(SektorKeuanganJasaPerusahaan $sektorKeuanganJasaPerusahaan)
    {
        return view('pages.perkembangan.produk-domestik.sektor-keuangan-jasa-perusahaan.edit', compact('sektorKeuanganJasaPerusahaan'));
    }

    public function update(Request $request, SektorKeuanganJasaPerusahaan $sektorKeuanganJasaPerusahaan)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput()->with('error', 'Gagal memperbarui data.');
        }

        $data = $request->all();
        $data['desa_id'] = session('desa_id');
        $sektorKeuanganJasaPerusahaan->update($data);

        return redirect()->route('perkembangan.produk-domestik.sektor-keuangan-jasa-perusahaan.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(SektorKeuanganJasaPerusahaan $sektorKeuanganJasaPerusahaan)
    {
        $sektorKeuanganJasaPerusahaan->delete();
        return redirect()->route('perkembangan.produk-domestik.sektor-keuangan-jasa-perusahaan.index')->with('success', 'Data berhasil dihapus.');
    }
}
