<?php

namespace App\Http\Controllers;

use App\Models\Pengangguran;
use App\Models\Kecamatan;
use App\Models\Desa;
use Illuminate\Http\Request;

class PengangguranController extends Controller
{
    public function index()
    {
        $penganggurans = Pengangguran::with(['kecamatan','desa'])->orderBy('tanggal', 'desc')->paginate(10);
        return view('pages.perkembangan.ekonomimasyarakat.pengangguran.index', compact('penganggurans'));
    }

    public function create()
    {
        $kecamatans = Kecamatan::all(); // ambil semua kecamatan
        $desas = Desa::all();           // ambil semua desa
        return view('pages.perkembangan.ekonomimasyarakat.pengangguran.create', compact('kecamatans','desas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'id_kecamatan' => 'required|integer|exists:kecamatans,id',
            'id_desa' => 'required|integer|exists:desas,id',
            'angkatan_kerja' => 'required|integer|min:0',
            'masih_sekolah' => 'required|integer|min:0',
            'ibu_rumah_tangga' => 'required|integer|min:0',
            'bekerja_penuh' => 'required|integer|min:0',
            'bekerja_tidak_tentu' => 'required|integer|min:0',
            'tidak_bekerja' => 'required|integer|min:0',
            'bekerja' => 'required|integer|min:0',
        ]);

        Pengangguran::create($request->all());

        return redirect()->route('perkembangan.ekonomimasyarakat.pengangguran.index')
            ->with('success', 'Data pengangguran berhasil ditambahkan.');
    }

    public function show(Pengangguran $pengangguran)
    {
        $pengangguran->load(['kecamatan','desa']); // pastikan relasi terload
        return view('pages.perkembangan.ekonomimasyarakat.pengangguran.show', compact('pengangguran'));
    }

    public function edit(Pengangguran $pengangguran)
    {
        $kecamatans = Kecamatan::all();
        $desas = Desa::all();
        return view('pages.perkembangan.ekonomimasyarakat.pengangguran.edit', compact('pengangguran','kecamatans','desas'));
    }

    public function update(Request $request, Pengangguran $pengangguran)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'id_kecamatan' => 'required|integer|exists:kecamatans,id',
            'id_desa' => 'required|integer|exists:desas,id',
            'angkatan_kerja' => 'required|integer|min:0',
            'masih_sekolah' => 'required|integer|min:0',
            'ibu_rumah_tangga' => 'required|integer|min:0',
            'bekerja_penuh' => 'required|integer|min:0',
            'bekerja_tidak_tentu' => 'required|integer|min:0',
            'tidak_bekerja' => 'required|integer|min:0',
            'bekerja' => 'required|integer|min:0',
        ]);

        $pengangguran->update($request->all());

        return redirect()->route('perkembangan.ekonomimasyarakat.pengangguran.index')
            ->with('success', 'Data pengangguran berhasil diperbarui.');
    }

    public function destroy(Pengangguran $pengangguran)
    {
        $pengangguran->delete();
        return redirect()->route('perkembangan.ekonomimasyarakat.pengangguran.index')
            ->with('success', 'Data pengangguran berhasil dihapus.');
    }
    // Endpoint AJAX: Ambil desa berdasarkan kecamatan
    public function getDesaByKecamatan(Request $request)
    {
        $id_kecamatan = $request->input('id_kecamatan');
        $desas = Desa::where('kecamatan_id', $id_kecamatan)->get();
        return response()->json($desas);
    }
}
