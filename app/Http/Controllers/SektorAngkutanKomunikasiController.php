<?php

namespace App\Http\Controllers;

use App\Models\SektorAngkutanKomunikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SektorAngkutanKomunikasiController extends Controller
{
    public function index()
{
    $desaId = session('desa_id');

    // ambil data sesuai kebutuhan (paginate contoh)
    $data = SektorAngkutanKomunikasi::with('desa')
                ->where('desa_id', $desaId)
                ->latest()
                ->paginate(10);

    return view('pages.perkembangan.produk-domestik.sektor-angkutan.index', compact('data'));
}

    public function create()
    {
        return view('pages.perkembangan.produk-domestik.sektor-angkutan.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'jml_kegiatan_pengangkutan' => 'nullable|integer|min:0',
            'jml_total_kendaraan_angkutan' => 'nullable|integer|min:0',
            'nilai_total_transaksi_pengangkutan' => 'nullable|integer|min:0',
            'nilai_total_biaya_dikeluarkan' => 'nullable|integer|min:0',
            'jml_kegiatan_pelabuhan_terminal' => 'nullable|integer|min:0',
            'total_nilai_transaksi_penunjang' => 'nullable|integer|min:0',
            'nilai_biaya_antara_dikeluarkan' => 'nullable|integer|min:0',
            'jml_kegiatan_informasi_telekomunikasi' => 'nullable|integer|min:0',
            'jml_nilai_aset_telekomunikasi' => 'nullable|integer|min:0',
            'nilai_transaksi_informasi' => 'nullable|integer|min:0',
            'biaya_dikeluarkan' => 'nullable|integer|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Gagal menambahkan data sektor angkutan dan komunikasi.');
        }

        $data = $request->all();
        $data['desa_id'] = session('desa_id');
        SektorAngkutanKomunikasi::create($data);

        return redirect()
            ->route('perkembangan.produk-domestik.sektor-angkutan.index')
            ->with('success', 'Data berhasil ditambahkan.');
    }

    public function show(SektorAngkutanKomunikasi $sektorAngkutan)
{
    // kirim juga dengan key 'angkutan' supaya view yang pakai $angkutan aman
    return view('pages.perkembangan.produk-domestik.sektor-angkutan.show', [
        'angkutan' => $sektorAngkutan
    ]);
}

   public function edit(SektorAngkutanKomunikasi $sektorAngkutan)
{
    // kirim juga sebagai $angkutan supaya view edit.blade.php yg sekarang bisa langsung pakai $angkutan
    return view('pages.perkembangan.produk-domestik.sektor-angkutan.edit', [
        'angkutan' => $sektorAngkutan
    ]);
}

    public function update(Request $request, SektorAngkutanKomunikasi $sektorAngkutan)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'jml_kegiatan_pengangkutan' => 'nullable|integer|min:0',
            'jml_total_kendaraan_angkutan' => 'nullable|integer|min:0',
            'nilai_total_transaksi_pengangkutan' => 'nullable|integer|min:0',
            'nilai_total_biaya_dikeluarkan' => 'nullable|integer|min:0',
            'jml_kegiatan_pelabuhan_terminal' => 'nullable|integer|min:0',
            'total_nilai_transaksi_penunjang' => 'nullable|integer|min:0',
            'nilai_biaya_antara_dikeluarkan' => 'nullable|integer|min:0',
            'jml_kegiatan_informasi_telekomunikasi' => 'nullable|integer|min:0',
            'jml_nilai_aset_telekomunikasi' => 'nullable|integer|min:0',
            'nilai_transaksi_informasi' => 'nullable|integer|min:0',
            'biaya_dikeluarkan' => 'nullable|integer|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Gagal memperbarui data sektor angkutan dan komunikasi.');
        }

        $data = $request->all();
        $data['desa_id'] = session('desa_id');

        $sektorAngkutan->update($data);

        return redirect()
            ->route('perkembangan.produk-domestik.sektor-angkutan.index')
            ->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(SektorAngkutanKomunikasi $sektorAngkutan)
    {
        $sektorAngkutan->delete();

        return redirect()
            ->route('perkembangan.produk-domestik.sektor-angkutan.index')
            ->with('success', 'Data berhasil dihapus.');
    }
}
