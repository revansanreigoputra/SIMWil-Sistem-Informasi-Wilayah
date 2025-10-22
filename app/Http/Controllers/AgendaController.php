<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class AgendaController extends Controller
{
    public function index()
    {
        $agenda = Agenda::latest()->get();
        return view('pages.utama.agenda.index', compact('agenda'));
    }

    public function create()
    {
        return view('pages.utama.agenda.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tgl_dari' => 'required|date',
            'tgl_sampai' => 'required|date|after_or_equal:tgl_dari',
            'lokasi' => 'required|string|max:255',
            'kegiatan' => 'required|string|max:255',
            'peserta' => 'required|string',
        ]);

        Agenda::create($request->all());

        return redirect()->route('utama.agenda.index')
            ->with('message', 'Agenda berhasil ditambahkan.');
    }

    public function show(Agenda $agenda)
    {

    }

    public function edit(Agenda $agenda)
    {
        return view('pages.utama.agenda.edit', compact('agenda'));
    }

    public function update(Request $request, Agenda $agenda)
    {
        $request->validate([
            'tgl_dari' => 'required|date',
            'tgl_sampai' => 'required|date|after_or_equal:tgl_dari',
            'lokasi' => 'required|string|max:255',
            'kegiatan' => 'required|string|max:255',
            'peserta' => 'required|string',
        ]);

        $agenda->update($request->all());

        return redirect()->route('utama.agenda.index')
            ->with('message', 'Agenda berhasil diperbarui.');
    }

    public function destroy(Agenda $agenda)
    {
        $agenda->delete();

        return redirect()->route('utama.agenda.index')
            ->with('message', 'Agenda berhasil dihapus.');
    }
public function cetak()
    {
        $agenda = Agenda::orderBy('tgl_dari', 'asc')->get();
        $pdf = PDF::loadView('pages.utama.agenda.cetak', compact('agenda'));

        // Karena tabel agenda memiliki banyak kolom, orientasi landscape lebih disarankan
        $pdf->setPaper('a4', 'landscape');

        return $pdf->stream('laporan-agenda-kegiatan.pdf');
    }
}
