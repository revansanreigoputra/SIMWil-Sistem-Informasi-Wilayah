<?php

namespace App\Http\Controllers;

use App\Models\MataPencaharianSektorPertanian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MataPencaharianSektorPertanianController extends Controller
{
    public function index()
    {
        $desaId = session('desa_id');
        $data = MataPencaharianSektorPertanian::with('desa')
                    ->where('desa_id', $desaId)
                    ->latest()
                    ->paginate(10);

        return view('pages.perkembangan.struktur-mata-pencaharian.sektor-pertanian.index', compact('data'));
    }

    public function create()
    {
        return view('pages.perkembangan.struktur-mata-pencaharian.sektor-pertanian.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'petani' => 'nullable|integer|min:0',
            'pemilik_usaha_tani' => 'nullable|integer|min:0',
            'buruh_tani' => 'nullable|integer|min:0',
            'jumlah' => 'nullable|integer|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()
                ->with('error', 'Gagal menambahkan data.');
        }

        $data = $request->all();
        $data['desa_id'] = session('desa_id');

        MataPencaharianSektorPertanian::create($data);

        return redirect()->route('perkembangan.struktur-mata-pencaharian.sektor-pertanian.index')
            ->with('success', 'Data berhasil ditambahkan.');
    }

   public function show($id)
{
    $desaId = session('desa_id'); // ambil desa dari session
    $sektorPertanian = \App\Models\MataPencaharianSektorPertanian::with('desa')
        ->where('desa_id', $desaId)
        ->findOrFail($id);

 return view('pages.perkembangan.struktur-mata-pencaharian.sektor-pertanian.show', compact('sektorPertanian'));
}

  public function edit($id)
{
    $desaId = session('desa_id'); // atau sesuai cara kamu ambil desa
    $sektorPertanian = MataPencaharianSektorPertanian::with('desa')
        ->where('desa_id', $desaId)
        ->findOrFail($id);

    // panggil view sesuai folder kamu di resources/views/pages/...
    return view('pages.perkembangan.struktur-mata-pencaharian.sektor-pertanian.edit', compact('sektorPertanian'));
}

    public function update(Request $request, MataPencaharianSektorPertanian $mataPencaharianSektorPertanian)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'petani' => 'nullable|integer|min:0',
            'pemilik_usaha_tani' => 'nullable|integer|min:0',
            'buruh_tani' => 'nullable|integer|min:0',
            'jumlah' => 'nullable|integer|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()
                ->with('error', 'Gagal memperbarui data.');
        }

        $data = $request->all();
        $data['desa_id'] = session('desa_id');

        $mataPencaharianSektorPertanian->update($data);

        return redirect()->route('perkembangan.struktur-mata-pencaharian.sektor-pertanian.index')
            ->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(MataPencaharianSektorPertanian $mataPencaharianSektorPertanian)
    {
        $mataPencaharianSektorPertanian->delete();

        return redirect()->route('perkembangan.struktur-mata-pencaharian.sektor-pertanian.index')
            ->with('success', 'Data berhasil dihapus.');
    }
}
