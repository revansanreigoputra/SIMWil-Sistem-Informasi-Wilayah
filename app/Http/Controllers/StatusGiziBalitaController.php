<?php

namespace App\Http\Controllers;

use App\Models\StatusGiziBalita;
use Illuminate\Http\Request;

class StatusGiziBalitaController extends Controller
{
    public function index()
    {
        $giziBalita = StatusGiziBalita::latest()->get();
        return view('pages.perkembangan.kesehatan-masyarakat.gizi-balita.index', compact('giziBalita'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'bergizi_buruk' => 'required|numeric',
            'bergizi_baik' => 'required|numeric',
            'bergizi_kurang' => 'required|numeric',
            'bergizi_lebih' => 'required|numeric',
        ]);

        $jumlah_balita = $request->bergizi_buruk + $request->bergizi_baik + $request->bergizi_kurang + $request->bergizi_lebih;

        StatusGiziBalita::create([
            'tanggal' => $request->tanggal,
            'bergizi_buruk' => $request->bergizi_buruk,
            'bergizi_baik' => $request->bergizi_baik,
            'bergizi_kurang' => $request->bergizi_kurang,
            'bergizi_lebih' => $request->bergizi_lebih,
            'jumlah_balita' => $jumlah_balita,
        ]);

        return redirect()->back()->with('success', 'Data berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $data = StatusGiziBalita::findOrFail($id);

        $request->validate([
            'tanggal' => 'required|date',
            'bergizi_buruk' => 'required|numeric',
            'bergizi_baik' => 'required|numeric',
            'bergizi_kurang' => 'required|numeric',
            'bergizi_lebih' => 'required|numeric',
        ]);

        $jumlah_balita = $request->bergizi_buruk + $request->bergizi_baik + $request->bergizi_kurang + $request->bergizi_lebih;

        $data->update([
            'tanggal' => $request->tanggal,
            'bergizi_buruk' => $request->bergizi_buruk,
            'bergizi_baik' => $request->bergizi_baik,
            'bergizi_kurang' => $request->bergizi_kurang,
            'bergizi_lebih' => $request->bergizi_lebih,
            'jumlah_balita' => $jumlah_balita,
        ]);

        return redirect()->back()->with('success', 'Data berhasil diperbarui.');
    }

    public function edit($id)
{
    $data = StatusGiziBalita::findOrFail($id);
    return view('pages.perkembangan.kesehatan-masyarakat.gizi-balita.edit', compact('data'));
}


    public function destroy($id)
    {
        $data = StatusGiziBalita::findOrFail($id);
        $data->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus.');
    }

    public function show($id)
    {
        $data = StatusGiziBalita::findOrFail($id);
        return view('pages.perkembangan.kesehatan-masyarakat.gizi-balita.show', compact('data'));
    }
}



