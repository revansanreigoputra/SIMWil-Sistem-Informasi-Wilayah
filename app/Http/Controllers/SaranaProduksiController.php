<?php

namespace App\Http\Controllers;

use App\Models\SaranaProduksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SaranaProduksiController extends Controller
{
    public function index()
    {
        $desaId = session('desa_id');
        $data = SaranaProduksi::with('desa')
            ->where('desa_id', $desaId)
            ->orderBy('tanggal', 'desc')
            ->paginate(10);
        return view('pages.perkembangan.asetekonomi.sarana_produksi.index', compact('data'));
    }

    public function create()
    {
        return view('pages.perkembangan.asetekonomi.sarana_produksi.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'produksi1'=>'nullable|integer|min:0',
            'produksi2'=>'nullable|integer|min:0',
            'produksi3'=>'nullable|integer|min:0',
            'produksi4'=>'nullable|integer|min:0',
            'produksi5'=>'nullable|integer|min:0',
            'produksi6'=>'nullable|integer|min:0',
            'produksi7'=>'nullable|integer|min:0',
            'produksi8'=>'nullable|integer|min:0',
            'produksi9'=>'nullable|integer|min:0',
            'produksi10'=>'nullable|integer|min:0',
            'produksi11'=>'nullable|integer|min:0',
            'produksi12'=>'nullable|integer|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $produksi = $request->only([
            'produksi1','produksi2','produksi3','produksi4','produksi5',
            'produksi6','produksi7','produksi8','produksi9','produksi10',
            'produksi11','produksi12'
        ]);

        $jumlah = array_sum($produksi);
        $produksi['produksi13'] = $jumlah;

        $data = [
            'desa_id' => session('desa_id'),
            'tanggal' => $request->tanggal,
            ...$produksi,
            'jumlah' => $jumlah,
        ];

        SaranaProduksi::create($data);

        return redirect()
            ->route('perkembangan.asetekonomi.sarana_produksi.index')
            ->with('success', 'Data berhasil disimpan.');
    }

    public function show(SaranaProduksi $saranaProduksi)
    {
        return view('pages.perkembangan.asetekonomi.sarana_produksi.show', compact('saranaProduksi'));
    }

    public function edit(SaranaProduksi $saranaProduksi)
    {
        return view('pages.perkembangan.asetekonomi.sarana_produksi.edit', compact('saranaProduksi'));
    }

    public function update(Request $request, SaranaProduksi $saranaProduksi)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'produksi1'=>'nullable|integer|min:0',
            'produksi2'=>'nullable|integer|min:0',
            'produksi3'=>'nullable|integer|min:0',
            'produksi4'=>'nullable|integer|min:0',
            'produksi5'=>'nullable|integer|min:0',
            'produksi6'=>'nullable|integer|min:0',
            'produksi7'=>'nullable|integer|min:0',
            'produksi8'=>'nullable|integer|min:0',
            'produksi9'=>'nullable|integer|min:0',
            'produksi10'=>'nullable|integer|min:0',
            'produksi11'=>'nullable|integer|min:0',
            'produksi12'=>'nullable|integer|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $produksi = $request->only([
            'produksi1','produksi2','produksi3','produksi4','produksi5',
            'produksi6','produksi7','produksi8','produksi9','produksi10',
            'produksi11','produksi12'
        ]);

        $jumlah = array_sum($produksi);
        $produksi['produksi13'] = $jumlah;

        $saranaProduksi->update([
            'desa_id' => session('desa_id'),
            'tanggal' => $request->tanggal,
            ...$produksi,
            'jumlah' => $jumlah,
        ]);

        return redirect()
            ->route('perkembangan.asetekonomi.sarana_produksi.index')
            ->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(SaranaProduksi $saranaProduksi)
    {
        $saranaProduksi->delete();

        return redirect()
            ->route('perkembangan.asetekonomi.sarana_produksi.index')
            ->with('success', 'Data berhasil dihapus.');
    }
}
