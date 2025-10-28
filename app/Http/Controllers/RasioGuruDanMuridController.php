<?php

namespace App\Http\Controllers;

use App\Models\RasioGuruDanMurid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RasioGuruDanMuridController extends Controller
{
    /**
     * Tampilkan daftar data.
     */
    public function index()
    {
        $desaId = session('desa_id');

        $items = RasioGuruDanMurid::with('desa')
            ->where('id_desa', $desaId)
            ->orderBy('tanggal', 'desc')
            ->paginate(10);

        return view('pages.perkembangan.pendidikanmasyarakat.rasio_guru_dan_murid.index', compact('items'));
    }

    /**
     * Tampilkan form tambah data.
     */
    public function create()
    {
        // Tidak perlu ambil data desa karena otomatis dari session
        return view('pages.perkembangan.pendidikanmasyarakat.rasio_guru_dan_murid.create');
    }

    /**
     * Simpan data baru ke database.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'guru_tk' => 'required|integer|min:0',
            'siswa_tk' => 'required|integer|min:0',
            'guru_sd' => 'required|integer|min:0',
            'siswa_sd' => 'required|integer|min:0',
            'guru_sltp' => 'required|integer|min:0',
            'siswa_sltp' => 'required|integer|min:0',
            'guru_slta' => 'required|integer|min:0',
            'siswa_slta' => 'required|integer|min:0',
            'guru_slb' => 'required|integer|min:0',
            'siswa_slb' => 'required|integer|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $request->all();
        $data['id_desa'] = session('desa_id'); // ✅ sesuai field di tabel

        RasioGuruDanMurid::create($data);

        return redirect()->route('perkembangan.pendidikanmasyarakat.rasio_guru_dan_murid.index')
            ->with('success', 'Data Rasio Guru & Murid berhasil ditambahkan.');
    }

    /**
     * Tampilkan detail data.
     */
    public function show($id)
    {
        $item = RasioGuruDanMurid::with('desa')->findOrFail($id);
        return view('pages.perkembangan.pendidikanmasyarakat.rasio_guru_dan_murid.show', compact('item'));
    }

    /**
     * Tampilkan form edit data.
     */
    public function edit($id)
    {
        $item = RasioGuruDanMurid::findOrFail($id);
        return view('pages.perkembangan.pendidikanmasyarakat.rasio_guru_dan_murid.edit', compact('item'));
    }

    /**
     * Update data di database.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'guru_tk' => 'required|integer|min:0',
            'siswa_tk' => 'required|integer|min:0',
            'guru_sd' => 'required|integer|min:0',
            'siswa_sd' => 'required|integer|min:0',
            'guru_sltp' => 'required|integer|min:0',
            'siswa_sltp' => 'required|integer|min:0',
            'guru_slta' => 'required|integer|min:0',
            'siswa_slta' => 'required|integer|min:0',
            'guru_slb' => 'required|integer|min:0',
            'siswa_slb' => 'required|integer|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $item = RasioGuruDanMurid::findOrFail($id);
        $data = $request->all();
        $data['id_desa'] = session('desa_id'); // ✅ sama seperti store

        $item->update($data);

        return redirect()->route('perkembangan.pendidikanmasyarakat.rasio_guru_dan_murid.index')
            ->with('success', 'Data Rasio Guru & Murid berhasil diperbarui.');
    }

    /**
     * Hapus data dari database.
     */
    public function destroy($id)
    {
        $item = RasioGuruDanMurid::findOrFail($id);
        $item->delete();

        return redirect()->route('perkembangan.pendidikanmasyarakat.rasio_guru_dan_murid.index')
            ->with('success', 'Data Rasio Guru & Murid berhasil dihapus.');
    }
}
