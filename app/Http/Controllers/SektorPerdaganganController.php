<?php

namespace App\Http\Controllers;

use App\Models\SektorPerdagangan;
use App\Models\Desa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SektorPerdaganganController extends Controller
{
    public function index()
    {
        $desaId = session('desa_id');
        $data = SektorPerdagangan::with('desa')
                ->where('desa_id', $desaId)
                ->latest()
                ->paginate(10);

        return view('pages.perkembangan.struktur-mata-pencaharian.sektor-perdagangan.index', compact('data'));
    }

    public function create()
    {
        return view('pages.perkembangan.struktur-mata-pencaharian.sektor-perdagangan.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'karyawan_perdagangan_hasil_bumi' => 'nullable|integer|min:0',
            'pengusaha_perdagangan_hasil_bumi' => 'nullable|integer|min:0',
            'buruh_perdagangan_hasil_bumi' => 'nullable|integer|min:0',
            'jumlah' => 'nullable|integer|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Gagal menambahkan data sektor perdagangan.');
        }

        $data = $request->all();
        $data['desa_id'] = session('desa_id');

        SektorPerdagangan::create($data);

        return redirect()
            ->route('perkembangan.struktur-mata-pencaharian.sektor-perdagangan.index')
            ->with('success', 'Data sektor perdagangan berhasil ditambahkan.');
    }

    public function show($id)
{
    $perdagangan = SektorPerdagangan::with('desa')->findOrFail($id);
    return view('pages.perkembangan.struktur-mata-pencaharian.sektor-perdagangan.show', compact('perdagangan'));
}

public function edit($id)
{
    $perdagangan = SektorPerdagangan::findOrFail($id);
    return view('pages.perkembangan.struktur-mata-pencaharian.sektor-perdagangan.edit', compact('perdagangan'));
}

    public function update(Request $request, SektorPerdagangan $sektorPerdagangan)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'karyawan_perdagangan_hasil_bumi' => 'nullable|integer|min:0',
            'pengusaha_perdagangan_hasil_bumi' => 'nullable|integer|min:0',
            'buruh_perdagangan_hasil_bumi' => 'nullable|integer|min:0',
            'jumlah' => 'nullable|integer|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Gagal memperbarui data sektor perdagangan.');
        }

        $data = $request->all();
        $data['desa_id'] = session('desa_id');

        $sektorPerdagangan->update($data);

        return redirect()
            ->route('perkembangan.struktur-mata-pencaharian.sektor-perdagangan.index')
            ->with('success', 'Data sektor perdagangan berhasil diperbarui.');
    }

    public function destroy(SektorPerdagangan $sektorPerdagangan)
    {
        $sektorPerdagangan->delete();

        return redirect()
            ->route('perkembangan.struktur-mata-pencaharian.sektor-perdagangan.index')
            ->with('success', 'Data sektor perdagangan berhasil dihapus.');
    }
}
