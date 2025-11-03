<?php

namespace App\Http\Controllers;

use App\Models\SektorPerikanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SektorPerikananController extends Controller
{
    public function index()
    {
        $desaId = session('desa_id');
        $perikanan = SektorPerikanan::with('desa')
                        ->where('desa_id', $desaId)
                        ->latest()
                        ->paginate(10);

        return view('pages.perkembangan.struktur-mata-pencaharian.sektor-perikanan.index', compact('perikanan'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'nelayan' => 'nullable|integer|min:0',
            'pemilik_usaha_perikanan' => 'nullable|integer|min:0',
            'buruh_perikanan' => 'nullable|integer|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Gagal menambahkan data.');
        }

        $data = $request->all();
        $data['desa_id'] = session('desa_id');
        $data['jumlah'] = ($request->nelayan ?? 0) + ($request->pemilik_usaha_perikanan ?? 0) + ($request->buruh_perikanan ?? 0);

        SektorPerikanan::create($data);

        return redirect()->route('perkembangan.struktur-mata-pencaharian.sektor-perikanan.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function show($id)
    {
        $data = SektorPerikanan::with('desa')->findOrFail($id);
        return view('pages.perkembangan.struktur-mata-pencaharian.sektor-perikanan.show', compact('data'));
    }

    public function update(Request $request, SektorPerikanan $sektorPerikanan)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'nelayan' => 'nullable|integer|min:0',
            'pemilik_usaha_perikanan' => 'nullable|integer|min:0',
            'buruh_perikanan' => 'nullable|integer|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Gagal memperbarui data.');
        }

        $data = $request->all();
        $data['desa_id'] = session('desa_id');
        $data['jumlah'] = ($request->nelayan ?? 0) + ($request->pemilik_usaha_perikanan ?? 0) + ($request->buruh_perikanan ?? 0);

        $sektorPerikanan->update($data);

        return redirect()->route('perkembangan.struktur-mata-pencaharian.sektor-perikanan.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(SektorPerikanan $sektorPerikanan)
    {
        $sektorPerikanan->delete();
        return redirect()->route('perkembangan.struktur-mata-pencaharian.sektor-perikanan.index')->with('success', 'Data berhasil dihapus.');
    }
}
