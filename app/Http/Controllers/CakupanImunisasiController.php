<?php

namespace App\Http\Controllers;

use App\Models\CakupanImunisasi;
use App\Models\Desa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CakupanImunisasiController extends Controller
{
    public function index()
    {
        $desaId = session('desa_id');
        $cakupan = CakupanImunisasi::with('desa')
                    ->where('desa_id', $desaId)
                    ->latest()
                    ->paginate(10);

        return view('pages.perkembangan.kesehatan-masyarakat.cakupan-imunisasi.index', compact('cakupan'));
    }

  public function create()
{
    // Tidak perlu kirim $desas karena dropdown tidak ditampilkan
    return view('pages.perkembangan.kesehatan-masyarakat.cakupan-imunisasi.create');
}

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'bayi_usia_2_bulan' => 'nullable|integer|min:0',
            'bayi_2_bulan_dpt1_bcg_polio1' => 'nullable|integer|min:0',
            'bayi_usia_3_bulan' => 'nullable|integer|min:0',
            'bayi_3_bulan_dpt2_polio2' => 'nullable|integer|min:0',
            'bayi_usia_4_bulan' => 'nullable|integer|min:0',
            'bayi_4_bulan_dpt3_polio3' => 'nullable|integer|min:0',
            'bayi_usia_9_bulan' => 'nullable|integer|min:0',
            'bayi_9_bulan_campak' => 'nullable|integer|min:0',
            'bayi_imunisasi_cacar' => 'nullable|integer|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Gagal menambahkan data cakupan imunisasi.');
        }

        $data = $request->all();
        $data['desa_id'] = session('desa_id');

        CakupanImunisasi::create($data);

        return redirect()
            ->route('perkembangan.kesehatan-masyarakat.cakupan-imunisasi.index')
            ->with('success', 'Data Cakupan Imunisasi berhasil ditambahkan.');
    }

  public function show($id)
{
    $data = CakupanAirBersih::with('desa')->findOrFail($id);
    return view('perkembangan.kesehatan_masyarakat.cakupan_air_bersih.show', compact('data'));
}

    public function edit(CakupanImunisasi $cakupanImunisasi)
    {
        return view('pages.perkembangan.kesehatan-masyarakat.cakupan-imunisasi.edit', compact('cakupanImunisasi'));
    }

    public function update(Request $request, CakupanImunisasi $cakupanImunisasi)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'bayi_usia_2_bulan' => 'nullable|integer|min:0',
            'bayi_2_bulan_dpt1_bcg_polio1' => 'nullable|integer|min:0',
            'bayi_usia_3_bulan' => 'nullable|integer|min:0',
            'bayi_3_bulan_dpt2_polio2' => 'nullable|integer|min:0',
            'bayi_usia_4_bulan' => 'nullable|integer|min:0',
            'bayi_4_bulan_dpt3_polio3' => 'nullable|integer|min:0',
            'bayi_usia_9_bulan' => 'nullable|integer|min:0',
            'bayi_9_bulan_campak' => 'nullable|integer|min:0',
            'bayi_imunisasi_cacar' => 'nullable|integer|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Gagal memperbarui data cakupan imunisasi.');
        }

        $data = $request->all();
        $data['desa_id'] = session('desa_id');

        $cakupanImunisasi->update($data);

        return redirect()
            ->route('perkembangan.kesehatan-masyarakat.cakupan-imunisasi.index')
            ->with('success', 'Data Cakupan Imunisasi berhasil diperbarui.');
    }

    public function destroy(CakupanImunisasi $cakupanImunisasi)
    {
        $cakupanImunisasi->delete();

        return redirect()
            ->route('perkembangan.kesehatan-masyarakat.cakupan-imunisasi.index')
            ->with('success', 'Data Cakupan Imunisasi berhasil dihapus.');
    }
}
