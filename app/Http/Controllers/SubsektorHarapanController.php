<?php

namespace App\Http\Controllers;

use App\Models\SubsektorHarapan;
use Illuminate\Http\Request;

class SubsektorHarapanController extends Controller
{
    public function index()
    {
        $data = SubsektorHarapan::latest()->get();
        return view('pages.perkembangan.kesehatan-masyarakat.subsektor-harapan.index', compact('data'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'angka_harapan_hidup_desa' => 'required|integer',
            'angka_harapan_hidup_kabupaten' => 'required|integer',
            'angka_harapan_hidup_provinsi' => 'required|integer',
            'angka_harapan_hidup_nasional' => 'required|integer',
        ]);

        SubsektorHarapan::create($validated);
        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }

    public function show($id)
    {
        $data = SubsektorHarapan::findOrFail($id);
        return view('pages.perkembangan.kesehatan-masyarakat.subsektor-harapan.show', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'angka_harapan_hidup_desa' => 'required|integer',
            'angka_harapan_hidup_kabupaten' => 'required|integer',
            'angka_harapan_hidup_provinsi' => 'required|integer',
            'angka_harapan_hidup_nasional' => 'required|integer',
        ]);

        SubsektorHarapan::findOrFail($id)->update($validated);
        return redirect()->back()->with('success', 'Data berhasil diperbarui');
    }

    public function destroy($id)
    {
        SubsektorHarapan::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
