<?php

namespace App\Http\Controllers;

use App\Models\PerkembanganSaranaPrasarana;
use Illuminate\Http\Request;

class PerkembanganSaranaPrasaranaController extends Controller
{
    public function index()
    {
        $data = PerkembanganSaranaPrasarana::all();
       return view('pages.perkembangan.kesehatan-masyarakat.sarana-prasarana.index', compact('data'));
    }

   public function create()
{
    return view('pages.perkembangan.kesehatan-masyarakat.sarana-prasarana.create');
}

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
        ]);

        PerkembanganSaranaPrasarana::create($request->all());

        return redirect()->route('perkembangan.kesehatan-masyarakat.sarana-prasarana.index')
            ->with('success', 'Data berhasil ditambahkan');
    }

   public function show($id)
{
    $data = PerkembanganSaranaPrasarana::findOrFail($id);
    return view('pages.perkembangan.kesehatan-masyarakat.sarana-prasarana.show', compact('data'));
}

    public function edit($id)
{
    $data = PerkembanganSaranaPrasarana::findOrFail($id);
    return view('pages.perkembangan.kesehatan-masyarakat.sarana-prasarana.edit', compact('data'));
}

    public function update(Request $request, $id)
    {
        $data = PerkembanganSaranaPrasarana::findOrFail($id);
        $data->update($request->all());

        return redirect()->route('perkembangan.kesehatan-masyarakat.sarana-prasarana.index')
            ->with('success', 'Data berhasil diperbarui');
    }

    public function destroy($id)
    {
        $data = PerkembanganSaranaPrasarana::findOrFail($id);
        $data->delete();

        return redirect()->route('perkembangan.kesehatan-masyarakat.sarana-prasarana.index')
            ->with('success', 'Data berhasil dihapus');
    }
}
