<?php

namespace App\Http\Controllers;

use App\Models\PerkembanganPasanganUsiaSuburKb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PerkembanganPasanganUsiaSuburKbController extends Controller
{
    public function index()
    {
        $desaId = session('desa_id');
        $data = PerkembanganPasanganUsiaSuburKb::with('desa')
                    ->where('desa_id', $desaId)
                    ->latest()
                    ->paginate(10);

        return view('pages.perkembangan.kesehatan-masyarakat.pasangan-usia-subur.index', compact('data'));
    }

    public function create()
    {
        return view('pages.perkembangan.kesehatan-masyarakat.pasangan-usia-subur.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Gagal menambahkan data pasangan usia subur dan KB.');
        }

        $data = $request->all();
        $data['desa_id'] = session('desa_id');

        PerkembanganPasanganUsiaSuburKb::create($data);

        return redirect()
            ->route('perkembangan.kesehatan-masyarakat.pasangan-usia-subur.index')
            ->with('success', 'Data berhasil ditambahkan.');
    }
    
public function show($id)
{
    $pasanganUsiaSuburKb = PerkembanganPasanganUsiaSuburKb::with('desa')->findOrFail($id);
    return view('pages.perkembangan.kesehatan-masyarakat.pasangan-usia-subur.show', compact('pasanganUsiaSuburKb'));
}

    public function edit(PerkembanganPasanganUsiaSuburKb $pasanganUsiaSuburKb)
    {
        return view('pages.perkembangan.kesehatan-masyarakat.pasangan-usia-subur.edit', compact('pasanganUsiaSuburKb'));
    }

    public function update(Request $request, PerkembanganPasanganUsiaSuburKb $pasanganUsiaSuburKb)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Gagal memperbarui data.');
        }

        $data = $request->all();
        $data['desa_id'] = session('desa_id');

        $pasanganUsiaSuburKb->update($data);

        return redirect()
            ->route('perkembangan.kesehatan-masyarakat.pasangan-usia-subur.index')
            ->with('success', 'Data berhasil diperbarui.');
    }

   public function destroy($id)
{
    $data = PerkembanganPasanganUsiaSuburKb::findOrFail($id);
    $data->delete();

    return redirect()->route('perkembangan.kesehatan-masyarakat.pasangan-usia-subur.index')
                     ->with('success', 'Data berhasil dihapus');
}

}
