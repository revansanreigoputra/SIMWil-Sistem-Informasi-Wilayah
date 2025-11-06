<?php

namespace App\Http\Controllers;

use App\Models\PerkembanganPenduduk;
use App\Models\Desa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PerkembanganPendudukController extends Controller
{
    /**
     * Tampilkan daftar data perkembangan penduduk per desa.
     */
    public function index()
{
    $desaId = session('desa_id');

    $perkembangan_penduduks = PerkembanganPenduduk::with('desa')
        ->where('desa_id', $desaId)
        ->latest('tanggal')
        ->paginate(10);

    return view('pages.perkembangan.perkembanganpenduduk.daftarpenduduk.index', compact('perkembangan_penduduks'));
}

    /**
     * Form tambah data (kalau dibutuhkan langsung di modal, bisa kosongkan return view ini).
     */
    public function create()
    {
        return view('pages.perkembangan.perkembanganpenduduk.daftarpenduduk.create');
    }

    /**
     * Simpan data baru.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'jumlah_laki_laki_tahun_ini' => 'required|integer|min:0',
            'jumlah_perempuan_tahun_ini' => 'required|integer|min:0',
            'jumlah_laki_laki_tahun_lalu' => 'required|integer|min:0',
            'jumlah_perempuan_tahun_lalu' => 'required|integer|min:0',
            'jumlah_kepala_keluarga_laki_laki_tahun_ini' => 'required|integer|min:0',
            'jumlah_kepala_keluarga_perempuan_tahun_ini' => 'required|integer|min:0',
            'jumlah_kepala_keluarga_laki_laki_tahun_lalu' => 'required|integer|min:0',
            'jumlah_kepala_keluarga_perempuan_tahun_lalu' => 'required|integer|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Gagal menambahkan data perkembangan penduduk.');
        }

        $data = $request->all();
        $data['desa_id'] = session('desa_id');

        PerkembanganPenduduk::create($data);

        return redirect()
            ->route('perkembangan-penduduk.index')
            ->with('success', 'Data perkembangan penduduk berhasil ditambahkan.');
    }

    /**
     * Tampilkan detail data.
     */
  public function show(\App\Models\PerkembanganPenduduk $perkembanganPenduduk)
{
    $perkembanganPenduduk->load('desa'); // lazy eager-load relasi desa
    return view('pages.perkembangan.perkembanganpenduduk.daftarpenduduk.show', compact('perkembanganPenduduk'));
}

    /**
     * Form edit data.
     */
    public function edit($id)
    {
        $data = PerkembanganPenduduk::findOrFail($id);
        return view('pages.perkembangan.perkembanganpenduduk.daftarpenduduk.edit', compact('data'));
    }

    /**
     * Update data.
     */
    public function update(Request $request, PerkembanganPenduduk $perkembangan_penduduk)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'jumlah_laki_laki_tahun_ini' => 'required|integer|min:0',
            'jumlah_perempuan_tahun_ini' => 'required|integer|min:0',
            'jumlah_laki_laki_tahun_lalu' => 'required|integer|min:0',
            'jumlah_perempuan_tahun_lalu' => 'required|integer|min:0',
            'jumlah_kepala_keluarga_laki_laki_tahun_ini' => 'required|integer|min:0',
            'jumlah_kepala_keluarga_perempuan_tahun_ini' => 'required|integer|min:0',
            'jumlah_kepala_keluarga_laki_laki_tahun_lalu' => 'required|integer|min:0',
            'jumlah_kepala_keluarga_perempuan_tahun_lalu' => 'required|integer|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Gagal memperbarui data perkembangan penduduk.');
        }

        $data = $request->all();
        $data['desa_id'] = session('desa_id');

        $perkembangan_penduduk->update($data);

        return redirect()
            ->route('perkembangan-penduduk.index')
            ->with('success', 'Data perkembangan penduduk berhasil diperbarui.');
    }

    /**
     * Hapus data.
     */
    public function destroy(PerkembanganPenduduk $perkembangan_penduduk)
    {
        $perkembangan_penduduk->delete();

        return redirect()
            ->route('perkembangan-penduduk.index')
            ->with('success', 'Data perkembangan penduduk berhasil dihapus.');
    }
}
