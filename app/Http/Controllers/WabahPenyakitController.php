<?php
// app/Http/Controllers/WabahPenyakitController.php

namespace App\Http\Controllers;

use App\Models\WabahPenyakit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WabahPenyakitController extends Controller
{
    public function index()
    {
        $wabahPenyakit = WabahPenyakit::orderBy('tanggal', 'desc')->get();
        return view('pages.perkembangan.kesehatan-masyarakat.wabah-penyakit.index', compact('wabahPenyakit'));
    }

    public function create()
    {
        return view('pages.perkembangan.kesehatan-masyarakat.wabah-penyakit.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'jenis_wabah' => 'required|string',
            'jumlah_kejadian_tahun_ini' => 'required|integer|min:0',
            'jumlah_meninggal' => 'required|integer|min:0',
        ]);

        try {
            WabahPenyakit::create($request->all());
            return redirect()->route('wabah-penyakit.index')->with('success', 'Data wabah penyakit berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data.');
        }
    }

    public function show($id)
    {
        $data = WabahPenyakit::findOrFail($id);
        return view('pages.perkembangan.kesehatan-masyarakat.wabah-penyakit.show', compact('data'));
    }

    public function edit($id)
{
    $data = WabahPenyakit::findOrFail($id);
    return view('pages.perkembangan.kesehatan-masyarakat.wabah-penyakit.edit', compact('data'));
}

    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'jenis_wabah' => 'required|string',
            'jumlah_kejadian_tahun_ini' => 'required|integer|min:0',
            'jumlah_meninggal' => 'required|integer|min:0',
        ]);

        try {
            $wabahPenyakit = WabahPenyakit::findOrFail($id);
            $wabahPenyakit->update($request->all());
            return redirect()->route('wabah-penyakit.index')->with('success', 'Data wabah penyakit berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui data.');
        }
    }

    public function destroy($id)
    {
        try {
            $wabahPenyakit = WabahPenyakit::findOrFail($id);
            $wabahPenyakit->delete();
            return redirect()->route('wabah-penyakit.index')->with('success', 'Data wabah penyakit berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }
}