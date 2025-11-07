<?php

namespace App\Http\Controllers;

use App\Models\PerkembanganSaranaPrasarana;
use App\Models\Desa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PerkembanganSaranaPrasaranaController extends Controller
{
    public function index()
    {
        $desaId = session('desa_id');

        $data = PerkembanganSaranaPrasarana::with('desa')
                    ->where('desa_id', $desaId)
                    ->latest()
                    ->paginate(10);

        return view('pages.perkembangan.kesehatan-masyarakat.sarana-prasarana.index', compact('data'));
    }

    public function create()
    {
        return view('pages.perkembangan.kesehatan-masyarakat.sarana-prasarana.create');
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
                ->with('error', 'Gagal menambahkan data Sarana & Prasarana.');
        }

        $data = $request->all();
        $data['desa_id'] = session('desa_id');

        PerkembanganSaranaPrasarana::create($data);

        return redirect()
            ->route('perkembangan.kesehatan-masyarakat.sarana-prasarana.index')
            ->with('success', 'Data Sarana & Prasarana berhasil ditambahkan.');
    }

  public function edit($id)
{
    $data = PerkembanganSaranaPrasarana::findOrFail($id);
    return view('pages.perkembangan.kesehatan-masyarakat.sarana-prasarana.edit', compact('data'));
}

    public function update(Request $request, PerkembanganSaranaPrasarana $saranaPrasarana)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Gagal memperbarui data Sarana & Prasarana.');
        }

        $data = $request->all();
        $data['desa_id'] = session('desa_id');

        $saranaPrasarana->update($data);

        return redirect()
            ->route('perkembangan.kesehatan-masyarakat.sarana-prasarana.index')
            ->with('success', 'Data Sarana & Prasarana berhasil diperbarui.');
    }

    public function destroy(PerkembanganSaranaPrasarana $saranaPrasarana)
    {
        $saranaPrasarana->delete();

        return redirect()
            ->route('perkembangan.kesehatan-masyarakat.sarana-prasarana.index')
            ->with('success', 'Data Sarana & Prasarana berhasil dihapus.');
    }

    public function show($id)
{
    $data = PerkembanganSaranaPrasarana::findOrFail($id);
    return view('pages.perkembangan.kesehatan-masyarakat.sarana-prasarana.show', compact('data'));
}

}
