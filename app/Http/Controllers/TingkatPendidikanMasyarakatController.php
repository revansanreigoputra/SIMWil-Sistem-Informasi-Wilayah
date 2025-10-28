<?php

namespace App\Http\Controllers;

use App\Models\TingkatPendidikanMasyarakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TingkatPendidikanMasyarakatController extends Controller
{
    /**
     * Tampilkan semua data sesuai desa dari session.
     */
    public function index()
    {
        $desaId = session('desa_id');

        $items = TingkatPendidikanMasyarakat::with('desa')
            ->where('desa_id', $desaId)
            ->latest()
            ->paginate(10);

        return view('pages.perkembangan.pendidikanmasyarakat.tingkat_pendidikan_masyarakat.index', compact('items'));
    }

    /**
     * Tampilkan form tambah data.
     */
    public function create()
    {
        // Tidak perlu ambil desa lagi karena pakai session
        return view('pages.perkembangan.pendidikanmasyarakat.tingkat_pendidikan_masyarakat.create');
    }

    /**
     * Simpan data baru.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'tidak_tamat_sd' => 'nullable|integer|min:0',
            'sd' => 'nullable|integer|min:0',
            'sltp' => 'nullable|integer|min:0',
            'slta' => 'nullable|integer|min:0',
            'diploma' => 'nullable|integer|min:0',
            'sarjana' => 'nullable|integer|min:0',
            'p_buta' => 'nullable|numeric|min:0',
            'p_tamat' => 'nullable|numeric|min:0',
            'p_cacat' => 'nullable|numeric|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $request->all();
        $data['desa_id'] = session('desa_id');

        TingkatPendidikanMasyarakat::create($data);

        return redirect()->route('perkembangan.pendidikanmasyarakat.tingkat_pendidikan_masyarakat.index')
            ->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Tampilkan detail data.
     */
    public function show($id)
    {
        $item = TingkatPendidikanMasyarakat::with('desa')->findOrFail($id);
        return view('pages.perkembangan.pendidikanmasyarakat.tingkat_pendidikan_masyarakat.show', compact('item'));
    }

    /**
     * Tampilkan form edit data.
     */
    public function edit($id)
    {
        $item = TingkatPendidikanMasyarakat::findOrFail($id);
        return view('pages.perkembangan.pendidikanmasyarakat.tingkat_pendidikan_masyarakat.edit', compact('item'));
    }

    /**
     * Update data.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'tidak_tamat_sd' => 'nullable|integer|min:0',
            'sd' => 'nullable|integer|min:0',
            'sltp' => 'nullable|integer|min:0',
            'slta' => 'nullable|integer|min:0',
            'diploma' => 'nullable|integer|min:0',
            'sarjana' => 'nullable|integer|min:0',
            'p_buta' => 'nullable|numeric|min:0',
            'p_tamat' => 'nullable|numeric|min:0',
            'p_cacat' => 'nullable|numeric|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $item = TingkatPendidikanMasyarakat::findOrFail($id);
        $data = $request->all();
        $data['desa_id'] = session('desa_id');

        $item->update($data);

        return redirect()->route('perkembangan.pendidikanmasyarakat.tingkat_pendidikan_masyarakat.index')
            ->with('success', 'Data berhasil diperbarui!');
    }

    /**
     * Hapus data.
     */
    public function destroy($id)
    {
        $item = TingkatPendidikanMasyarakat::findOrFail($id);
        $item->delete();

        return redirect()->route('perkembangan.pendidikanmasyarakat.tingkat_pendidikan_masyarakat.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
