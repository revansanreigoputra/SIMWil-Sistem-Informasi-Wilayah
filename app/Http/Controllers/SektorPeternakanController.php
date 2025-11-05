<?php

namespace App\Http\Controllers;

use App\Models\SektorPeternakan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SektorPeternakanController extends Controller
{
    public function index()
    {
        $desaId = session('desa_id');
        $peternakan = SektorPeternakan::with('desa')
                        ->where('desa_id', $desaId)
                        ->latest()
                        ->paginate(10);

        return view('pages.perkembangan.struktur-mata-pencaharian.sektor-peternakan.index', compact('peternakan'));
    }

    public function create()
    {
        return view('pages.perkembangan.struktur-mata-pencaharian.sektor-peternakan.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'peternakan_perorangan' => 'nullable|integer|min:0',
            'pemilik_usaha_peternakan' => 'nullable|integer|min:0',
            'buruh_peternakan' => 'nullable|integer|min:0',
            'jumlah' => 'nullable|integer|min:0',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput()->with('error', 'Gagal menambahkan data.');
        }

        $data = $request->all();
        $data['desa_id'] = session('desa_id');

        SektorPeternakan::create($data);

        return redirect()
            ->route('perkembangan.struktur-mata-pencaharian.sektor-peternakan.index')
            ->with('success', 'Data berhasil ditambahkan.');
    }

    public function show($id)
    {
        $data = SektorPeternakan::with('desa')->findOrFail($id);
        return view('pages.perkembangan.struktur-mata-pencaharian.sektor-peternakan.show', compact('data'));
    }

    public function edit($id)
    {
        $data = SektorPeternakan::findOrFail($id);
        return view('pages.perkembangan.struktur-mata-pencaharian.sektor-peternakan.edit', compact('data'));
    }

    public function update(Request $request, SektorPeternakan $sektorPeternakan)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'peternakan_perorangan' => 'nullable|integer|min:0',
            'pemilik_usaha_peternakan' => 'nullable|integer|min:0',
            'buruh_peternakan' => 'nullable|integer|min:0',
            'jumlah' => 'nullable|integer|min:0',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput()->with('error', 'Gagal memperbarui data.');
        }

        $data = $request->all();
        $data['desa_id'] = session('desa_id');

        $sektorPeternakan->update($data);

        return redirect()
            ->route('perkembangan.struktur-mata-pencaharian.sektor-peternakan.index')
            ->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(SektorPeternakan $sektorPeternakan)
    {
        $sektorPeternakan->delete();

        return redirect()
            ->route('perkembangan.struktur-mata-pencaharian.sektor-peternakan.index')
            ->with('success', 'Data berhasil dihapus.');
    }
}
