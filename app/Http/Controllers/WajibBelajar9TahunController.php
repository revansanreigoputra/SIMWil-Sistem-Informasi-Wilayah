<?php

namespace App\Http\Controllers;

use App\Models\WajibBelajar9Tahun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WajibBelajar9TahunController extends Controller
{
    public function index()
    {
        $desaId = session('desa_id');
        $items = WajibBelajar9Tahun::with('desa')
            ->where('desa_id', $desaId)
            ->orderBy('tanggal', 'desc')
            ->paginate(10);

        return view('pages.perkembangan.pendidikanmasyarakat.wajib_belajar_9_tahun.index', compact('items'));
    }

    public function create()
    {
        return view('pages.perkembangan.pendidikanmasyarakat.wajib_belajar_9_tahun.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'penduduk' => 'required|integer|min:0',
            'masih_sekolah' => 'required|integer|min:0',
            'tidak_sekolah' => 'required|integer|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $penduduk = $request->penduduk;
        $masihSekolah = $request->masih_sekolah;
        $tidakSekolah = $request->tidak_sekolah;

        $persentaseMasih = $penduduk > 0 ? ($masihSekolah / $penduduk) * 100 : 0;
        $persentaseTidak = $penduduk > 0 ? ($tidakSekolah / $penduduk) * 100 : 0;

        WajibBelajar9Tahun::create([
            'desa_id' => session('desa_id'),
            'tanggal' => $request->tanggal,
            'penduduk' => $penduduk,
            'masih_sekolah' => $masihSekolah,
            'tidak_sekolah' => $tidakSekolah,
            'persentase_masih_sekolah' => $persentaseMasih,
            'persentase_tidak_sekolah' => $persentaseTidak,
        ]);

        return redirect()->route('perkembangan.pendidikanmasyarakat.wajib_belajar_9_tahun.index')
            ->with('success', 'Data Wajib Belajar 9 Tahun berhasil ditambahkan.');
    }

    public function show($id)
    {
        $item = WajibBelajar9Tahun::with('desa')->findOrFail($id);
        return view('pages.perkembangan.pendidikanmasyarakat.wajib_belajar_9_tahun.show', compact('item'));
    }

    public function edit($id)
    {
        $item = WajibBelajar9Tahun::findOrFail($id);
        return view('pages.perkembangan.pendidikanmasyarakat.wajib_belajar_9_tahun.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'penduduk' => 'required|integer|min:0',
            'masih_sekolah' => 'required|integer|min:0',
            'tidak_sekolah' => 'required|integer|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $item = WajibBelajar9Tahun::findOrFail($id);

        $penduduk = $request->penduduk;
        $masihSekolah = $request->masih_sekolah;
        $tidakSekolah = $request->tidak_sekolah;

        $persentaseMasih = $penduduk > 0 ? ($masihSekolah / $penduduk) * 100 : 0;
        $persentaseTidak = $penduduk > 0 ? ($tidakSekolah / $penduduk) * 100 : 0;

        $item->update([
            'desa_id' => session('desa_id'),
            'tanggal' => $request->tanggal,
            'penduduk' => $penduduk,
            'masih_sekolah' => $masihSekolah,
            'tidak_sekolah' => $tidakSekolah,
            'persentase_masih_sekolah' => $persentaseMasih,
            'persentase_tidak_sekolah' => $persentaseTidak,
        ]);

        return redirect()->route('perkembangan.pendidikanmasyarakat.wajib_belajar_9_tahun.index')
            ->with('success', 'Data Wajib Belajar 9 Tahun berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $item = WajibBelajar9Tahun::findOrFail($id);
        $item->delete();

        return redirect()->route('perkembangan.pendidikanmasyarakat.wajib_belajar_9_tahun.index')
            ->with('success', 'Data Wajib Belajar 9 Tahun berhasil dihapus.');
    }
}
