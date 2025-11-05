<?php

namespace App\Http\Controllers;

use App\Models\SektorKehutanan;
use App\Models\Desa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SektorKehutananController extends Controller
{
    public function index()
    {
        $desaId = session('desa_id');
        $data = SektorKehutanan::with('desa')
                    ->where('desa_id', $desaId)
                    ->latest()
                    ->paginate(10);

        return view('pages.perkembangan.struktur-mata-pencaharian.sektor-kehutanan.index', compact('data'));
    }

    public function create()
    {
        return view('pages.perkembangan.struktur-mata-pencaharian.sektor-kehutanan.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'pengumpul_hasil_hutan' => 'nullable|integer|min:0',
            'pemilik_usaha_hasil_hutan' => 'nullable|integer|min:0',
            'buruh_usaha_hasil_hutan' => 'nullable|integer|min:0',
            'jumlah' => 'nullable|integer|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Gagal menambahkan data sektor kehutanan.');
        }

        $data = $request->all();
        $data['desa_id'] = session('desa_id');

        SektorKehutanan::create($data);

        return redirect()
            ->route('perkembangan.struktur-mata-pencaharian.sektor-kehutanan.index')
            ->with('success', 'Data sektor kehutanan berhasil ditambahkan.');
    }

    public function show($id)
    {
        $data = SektorKehutanan::with('desa')->findOrFail($id);
        return view('pages.perkembangan.struktur-mata-pencaharian.sektor-kehutanan.show', compact('data'));
    }

    public function edit($id)
    {
        $data = SektorKehutanan::findOrFail($id);
        return view('pages.perkembangan.struktur-mata-pencaharian.sektor-kehutanan.edit', compact('data'));
    }

    public function update(Request $request, SektorKehutanan $sektorKehutanan)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'pengumpul_hasil_hutan' => 'nullable|integer|min:0',
            'pemilik_usaha_hasil_hutan' => 'nullable|integer|min:0',
            'buruh_usaha_hasil_hutan' => 'nullable|integer|min:0',
            'jumlah' => 'nullable|integer|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Gagal memperbarui data sektor kehutanan.');
        }

        $data = $request->all();
        $data['desa_id'] = session('desa_id');

        $sektorKehutanan->update($data);

        return redirect()
            ->route('perkembangan.struktur-mata-pencaharian.sektor-kehutanan.index')
            ->with('success', 'Data sektor kehutanan berhasil diperbarui.');
    }

    public function destroy(SektorKehutanan $sektorKehutanan)
    {
        $sektorKehutanan->delete();

        return redirect()
            ->route('perkembangan.struktur-mata-pencaharian.sektor-kehutanan.index')
            ->with('success', 'Data sektor kehutanan berhasil dihapus.');
    }
}
