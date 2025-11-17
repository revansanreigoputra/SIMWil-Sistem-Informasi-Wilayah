<?php

namespace App\Http\Controllers;

use App\Models\PendapatanRillKeluarga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PendapatanRillKeluargaController extends Controller
{
    public function index()
    {
        $desaId = session('desa_id');

        $data = PendapatanRillKeluarga::with('desa')
            ->where('id_desa', $desaId)
            ->latest()
            ->paginate(10);

        return view('pages.perkembangan.pendapatanperkapital.pendapatan_rill_keluarga.index', compact('data'));
    }

    public function create()
    {
        return view('pages.perkembangan.pendapatanperkapital.pendapatan_rill_keluarga.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'kk' => 'required|integer|min:1',
            'ak' => 'required|integer|min:1',
            'pendapatan_kk' => 'required|numeric|min:0',
            'pendapatan_ak' => 'required|numeric|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $desaId = session('desa_id');

        $total1 = $request->pendapatan_kk + $request->pendapatan_ak;
        $total2 = $total1 / $request->ak;

        PendapatanRillKeluarga::create([
            'id_desa' => $desaId,
            'tanggal' => $request->tanggal,
            'kk' => $request->kk,
            'ak' => $request->ak,
            'pendapatan_kk' => $request->pendapatan_kk,
            'pendapatan_ak' => $request->pendapatan_ak,
            'total1' => $total1,
            'total2' => $total2,
        ]);

        return redirect()->route('perkembangan.pendapatanperkapital.pendapatan_rill_keluarga.index')
                         ->with('success', 'Data berhasil ditambahkan.');
    }

    // 🔹 Method SHOW
    public function show(PendapatanRillKeluarga $pendapatan_rill_keluarga)
    {
        return view('pages.perkembangan.pendapatanperkapital.pendapatan_rill_keluarga.show', [
            'item' => $pendapatan_rill_keluarga,
        ]);
    }

    public function edit(PendapatanRillKeluarga $pendapatan_rill_keluarga)
    {
        return view('pages.perkembangan.pendapatanperkapital.pendapatan_rill_keluarga.edit', [
            'item' => $pendapatan_rill_keluarga,
        ]);
    }

    public function update(Request $request, PendapatanRillKeluarga $pendapatan_rill_keluarga)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'kk' => 'required|integer|min:1',
            'ak' => 'required|integer|min:1',
            'pendapatan_kk' => 'required|numeric|min:0',
            'pendapatan_ak' => 'required|numeric|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $desaId = session('desa_id');

        $total1 = $request->pendapatan_kk + $request->pendapatan_ak;
        $total2 = $total1 / $request->ak;

        $pendapatan_rill_keluarga->update([
            'id_desa' => $desaId,
            'tanggal' => $request->tanggal,
            'kk' => $request->kk,
            'ak' => $request->ak,
            'pendapatan_kk' => $request->pendapatan_kk,
            'pendapatan_ak' => $request->pendapatan_ak,
            'total1' => $total1,
            'total2' => $total2,
        ]);

        return redirect()->route('perkembangan.pendapatanperkapital.pendapatan_rill_keluarga.index')
                         ->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(PendapatanRillKeluarga $pendapatan_rill_keluarga)
    {
        $pendapatan_rill_keluarga->delete();

        return redirect()->route('perkembangan.pendapatanperkapital.pendapatan_rill_keluarga.index')
                         ->with('success', 'Data berhasil dihapus.');
    }
}
