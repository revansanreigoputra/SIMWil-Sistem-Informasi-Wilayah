<?php

namespace App\Http\Controllers;

use App\Models\SektorTambang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SektorTambangController extends Controller
{
    public function index()
    {
        $desaId = session('desa_id');

        $data = SektorTambang::with('desa')
            ->where('desa_id', $desaId)
            ->latest()
            ->paginate(10);

        return view('pages.perkembangan.struktur-mata-pencaharian.sektor-tambang.index', compact('data'));
    }

    public function create()
    {
        return view('pages.perkembangan.struktur-mata-pencaharian.sektor-tambang.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'penambang_galian_c' => 'nullable|integer|min:0',
            'pemilik_usaha_pertambangan' => 'nullable|integer|min:0',
            'buruh_usaha_pertambangan' => 'nullable|integer|min:0',
            'jumlah' => 'nullable|integer|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Gagal menambahkan data sektor tambang.');
        }

        $data = $request->all();
        $data['desa_id'] = session('desa_id');

        SektorTambang::create($data);

        return redirect()
            ->route('perkembangan.struktur-mata-pencaharian.sektor-tambang.index')
            ->with('success', 'Data Sektor Tambang berhasil ditambahkan.');
    }

    public function show($id)
    {
        $data = SektorTambang::with('desa')->findOrFail($id);
        return view('pages.perkembangan.struktur-mata-pencaharian.sektor-tambang.show', compact('data'));
    }

    public function edit($id)
    {
        $data = SektorTambang::findOrFail($id);
        return view('pages.perkembangan.struktur-mata-pencaharian.sektor-tambang.edit', compact('data'));
    }

    public function update(Request $request, SektorTambang $sektorTambang)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'penambang_galian_c' => 'nullable|integer|min:0',
            'pemilik_usaha_pertambangan' => 'nullable|integer|min:0',
            'buruh_usaha_pertambangan' => 'nullable|integer|min:0',
            'jumlah' => 'nullable|integer|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Gagal memperbarui data sektor tambang.');
        }

        $data = $request->all();
        $data['desa_id'] = session('desa_id');

        $sektorTambang->update($data);

        return redirect()
            ->route('perkembangan.struktur-mata-pencaharian.sektor-tambang.index')
            ->with('success', 'Data Sektor Tambang berhasil diperbarui.');
    }

    public function destroy(SektorTambang $sektorTambang)
    {
        $sektorTambang->delete();

        return redirect()
            ->route('perkembangan.struktur-mata-pencaharian.sektor-tambang.index')
            ->with('success', 'Data Sektor Tambang berhasil dihapus.');
    }
}
