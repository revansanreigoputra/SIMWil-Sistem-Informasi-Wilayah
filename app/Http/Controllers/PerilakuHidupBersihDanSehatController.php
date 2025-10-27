<?php

namespace App\Http\Controllers;

use App\Models\PerilakuHidupBersihDanSehat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PerilakuHidupBersihDanSehatController extends Controller
{
    public function index()
    {
        $desaId = session('desa_id');

        // Ambil data dengan relasi desa, paginasi 10 baris
        $data = PerilakuHidupBersihDanSehat::with('desa')
            ->where('desa_id', $desaId)
            ->latest()
            ->paginate(10);

        // Kirim variabel 'data' supaya cocok dengan index.blade.php
        return view('pages.perkembangan.kesehatan-masyarakat.perilaku-hidup-bersih-dan-sehat.index', compact('data'));
    }

    public function create()
    {
        // Tidak perlu kirim $desas (pakai session('desa_id'))
        return view('pages.perkembangan.kesehatan-masyarakat.perilaku-hidup-bersih-dan-sehat.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'keluarga_wc_sehat' => 'nullable|integer|min:0',
            'keluarga_wc_tidak_standar' => 'nullable|integer|min:0',
            'keluarga_buang_air_sungai' => 'nullable|integer|min:0',
            'keluarga_mck_umum' => 'nullable|integer|min:0',
            'makan_1x' => 'nullable|string',
            'makan_2x' => 'nullable|string',
            'makan_3x' => 'nullable|string',
            'makan_lebih_3x' => 'nullable|string',
            'belum_tentu_makan' => 'nullable|string',
            'dukun_terlatih' => 'nullable|string',
            'tenaga_kesehatan' => 'nullable|string',
            'obat_tradisional_dukun' => 'nullable|string',
            'paranormal' => 'nullable|string',
            'obat_keluarga_sendiri' => 'nullable|string',
            'tidak_diobati' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Gagal menambahkan data perilaku hidup bersih dan sehat.');
        }

        $data = $request->all();
        $data['desa_id'] = session('desa_id');

        PerilakuHidupBersihDanSehat::create($data);

        return redirect()
            ->route('perkembangan.kesehatan-masyarakat.perilaku-hidup-bersih-dan-sehat.index')
            ->with('success', 'Data berhasil ditambahkan.');
    }

  public function show($id)
{
    $perilaku = PerilakuHidupBersihDanSehat::with('desa')->findOrFail($id);
    return view('pages.perkembangan.kesehatan-masyarakat.perilaku-hidup-bersih-dan-sehat.show', compact('perilaku'));
}


    public function edit($id)
    {
        $data = PerilakuHidupBersihDanSehat::findOrFail($id);
        return view('pages.perkembangan.kesehatan-masyarakat.perilaku-hidup-bersih-dan-sehat.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'keluarga_wc_sehat' => 'nullable|integer|min:0',
            'keluarga_wc_tidak_standar' => 'nullable|integer|min:0',
            'keluarga_buang_air_sungai' => 'nullable|integer|min:0',
            'keluarga_mck_umum' => 'nullable|integer|min:0',
           'makan_1x' => 'nullable|string',
            'makan_2x' => 'nullable|string',
            'makan_3x' => 'nullable|string',
            'makan_lebih_3x' => 'nullable|string',
            'belum_tentu_makan' => 'nullable|string',
            'dukun_terlatih' => 'nullable|string',
            'tenaga_kesehatan' => 'nullable|string',
            'obat_tradisional_dukun' => 'nullable|string',
            'paranormal' => 'nullable|string',
            'obat_keluarga_sendiri' => 'nullable|string',
            'tidak_diobati' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Gagal memperbarui data perilaku hidup bersih dan sehat.');
        }

        $data = $request->all();
        $data['desa_id'] = session('desa_id');

        $model = PerilakuHidupBersihDanSehat::findOrFail($id);
        $model->update($data);

        return redirect()
            ->route('perkembangan.kesehatan-masyarakat.perilaku-hidup-bersih-dan-sehat.index')
            ->with('success', 'Data berhasil diperbarui.');
    }

    
    public function destroy($id)
    {
        $model = PerilakuHidupBersihDanSehat::findOrFail($id);
        $model->delete();

        return redirect()
            ->route('perkembangan.kesehatan-masyarakat.perilaku-hidup-bersih-dan-sehat.index')
            ->with('success', 'Data berhasil dihapus.');
    }

    
}
