<?php

namespace App\Http\Controllers;

use App\Models\MataPencaharianPerkebunan;
use App\Models\Desa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MataPencaharianPerkebunanController extends Controller
{
    public function index()
    {
        $desaId = session('desa_id');
        $data = MataPencaharianPerkebunan::with('desa')
                    ->where('desa_id', $desaId)
                    ->latest()
                    ->paginate(10);

        return view('pages.perkembangan.struktur-mata-pencaharian.sektor-perkebunan.index', compact('data'));
    }

    public function create()
    {
        return view('pages.perkembangan.struktur-mata-pencaharian.sektor-perkebunan.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'karyawan_perusahaan_perkebunan' => 'nullable|integer|min:0',
            'pemilik_usaha_perkebunan' => 'nullable|integer|min:0',
            'buruh_perkebunan' => 'nullable|integer|min:0',
            'jumlah' => 'nullable|integer|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()
                ->with('error', 'Gagal menambahkan data mata pencaharian sektor perkebunan.');
        }

        $data = $request->all();
        $data['desa_id'] = session('desa_id');

        MataPencaharianPerkebunan::create($data);

        return redirect()
            ->route('perkembangan.struktur-mata-pencaharian.sektor-perkebunan.index')
            ->with('success', 'Data berhasil ditambahkan.');
    }

    public function show($id)
    {
        $data = MataPencaharianPerkebunan::with('desa')->findOrFail($id);
        return view('pages.perkembangan.struktur-mata-pencaharian.sektor-perkebunan.show', compact('data'));
    }

    public function edit(MataPencaharianPerkebunan $sektorPerkebunan)
    {
        return view('pages.perkembangan.struktur-mata-pencaharian.sektor-perkebunan.edit', compact('sektorPerkebunan'));
    }

    public function update(Request $request, MataPencaharianPerkebunan $sektorPerkebunan)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'karyawan_perusahaan_perkebunan' => 'nullable|integer|min:0',
            'pemilik_usaha_perkebunan' => 'nullable|integer|min:0',
            'buruh_perkebunan' => 'nullable|integer|min:0',
            'jumlah' => 'nullable|integer|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()
                ->with('error', 'Gagal memperbarui data.');
        }

        $data = $request->all();
        $data['desa_id'] = session('desa_id');
        $sektorPerkebunan->update($data);

        return redirect()
            ->route('perkembangan.struktur-mata-pencaharian.sektor-perkebunan.index')
            ->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(MataPencaharianPerkebunan $sektorPerkebunan)
    {
        $sektorPerkebunan->delete();

        return redirect()
            ->route('perkembangan.struktur-mata-pencaharian.sektor-perkebunan.index')
            ->with('success', 'Data berhasil dihapus.');
    }
}
