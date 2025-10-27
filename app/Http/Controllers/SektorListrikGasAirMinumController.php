<?php

namespace App\Http\Controllers;

use App\Models\SektorListrikGasAirMinum;
use App\Models\Desa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SektorListrikGasAirMinumController extends Controller
{
    public function index()
    {
        $desaId = session('desa_id');
        $data = SektorListrikGasAirMinum::with('desa')
            ->where('desa_id', $desaId)
            ->latest()
            ->paginate(10);

        return view('pages.perkembangan.produk-domestik.sektor-listrik-gas-air-minum.index', compact('data'));
    }

    public function create()
    {
        return view('pages.perkembangan.produk-domestik.sektor-listrik-gas-air-minum.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Gagal menambahkan data sektor listrik, gas, dan air minum.');
        }

        $data = $request->all();
        $data['desa_id'] = session('desa_id');

        SektorListrikGasAirMinum::create($data);

        return redirect()
            ->route('perkembangan.produk-domestik.sektor-listrik-gas-air-minum.index')
            ->with('success', 'Data berhasil ditambahkan.');
    }

    public function show($id)
    {
        $data = SektorListrikGasAirMinum::with('desa')->findOrFail($id);
        return view('pages.perkembangan.produk-domestik.sektor-listrik-gas-air-minum.show', compact('data'));
    }

  public function edit($id)
{
    $sektor = SektorListrikGasAirMinum::findOrFail($id);
    return view('pages.perkembangan.produk-domestik.sektor-listrik-gas-air-minum.edit', compact('sektor'));
}

    public function update(Request $request, SektorListrikGasAirMinum $sektor)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Gagal memperbarui data sektor listrik, gas, dan air minum.');
        }

        $data = $request->all();
        $data['desa_id'] = session('desa_id');

        $sektor->update($data);

        return redirect()
            ->route('perkembangan.produk-domestik.sektor-listrik-gas-air-minum.index')
            ->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(SektorListrikGasAirMinum $sektor)
    {
        $sektor->delete();

        return redirect()
            ->route('perkembangan.produk-domestik.sektor-listrik-gas-air-minum.index')
            ->with('success', 'Data berhasil dihapus.');
    }
}
