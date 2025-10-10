<?php

namespace App\Http\Controllers;

use App\Models\pertanggungjawaban;
use App\Models\Desa;
use Illuminate\Http\Request;

class PertanggungjawabanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Pertanggungjawaban::with(['desa'])->orderBy('tanggal', 'desc')->get();
        return view('pages.perkembangan.pemerintahdesadankelurahan.pertanggungjawaban.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $desas = Desa::orderBy('nama_desa')->get();
        return view('pages.perkembangan.pemerintahdesadankelurahan.pertanggungjawaban.create', compact('desas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'id_desa' => 'required|exists:desas,id',
            'penyampaian_laporan' => 'nullable|in:ada,tidak_ada',
            'jumlah_informasi' => 'nullable|numeric',
            'status_laporan' => 'nullable|in:diterima,ditolak',
            'laporan_kinerja' => 'nullable|in:diterima,ditolak',
            'jumlah_media_informasi' => 'nullable|numeric',
            'jumlah_pengaduan_diterima' => 'nullable|numeric',
            'jumlah_pengaduan_selesai' => 'nullable|numeric',
        ]);

        // Bersihkan input dan set kolom enum menjadi null jika kosong
        foreach (['penyampaian_laporan','status_laporan','laporan_kinerja'] as $field) {
            if (empty($validated[$field])) {
                $validated[$field] = null;
            }
        }
        Pertanggungjawaban::create($validated);

        return redirect()->route('perkembangan.pemerintahdesadankelurahan.pertanggungjawaban.index')
                         ->with('success', 'Data pertanggungjawaban berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $pertanggungjawaban = pertanggungjawaban::findOrFail($id);
        $pertanggungjawaban->load(['desa']);
        return view('pages.perkembangan.pemerintahdesadankelurahan.pertanggungjawaban.show', compact('pertanggungjawaban'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pertanggungjawaban = Pertanggungjawaban::findOrFail($id);
        $desas = Desa::orderBy('nama_desa')->get();
        return view('pages.perkembangan.pemerintahdesadankelurahan.pertanggungjawaban.edit', compact('pertanggungjawaban', 'desas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
         $validated = $request->validate([
            'tanggal' => 'required|date',
            'id_desa' => 'required|exists:desas,id',
            'penyampaian_laporan' => 'nullable|in:ada,tidak_ada',
            'jumlah_informasi' => 'nullable|numeric',
            'status_laporan' => 'nullable|in:diterima,ditolak',
            'laporan_kinerja' => 'nullable|in:diterima,ditolak',
            'jumlah_media_informasi' => 'nullable|numeric',
            'jumlah_pengaduan_diterima' => 'nullable|numeric',
            'jumlah_pengaduan_selesai' => 'nullable|numeric',
        ]);

        foreach (['jumlah_informasi','jumlah_media_informasi','jumlah_pengaduan_diterima','jumlah_pengaduan_selesai'] as $field) {
            if (isset($validated[$field])) {
                $validated[$field] = preg_replace('/[^0-9]/', '', $validated[$field]);
            }
        }

        $pertanggungjawaban = Pertanggungjawaban::findOrFail($id);
        $pertanggungjawaban->update($validated);

        return redirect()->route('perkembangan.pemerintahdesadankelurahan.pertanggungjawaban.index')
                         ->with('success', 'Data pertanggungjawaban berhasil diperbarui.');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pertanggungjawaban = Pertanggungjawaban::findOrFail($id);
        $pertanggungjawaban->delete();

        return redirect()->route('perkembangan.pemerintahdesadankelurahan.pertanggungjawaban.index')
                         ->with('success', 'Data pertanggungjawaban berhasil dihapus.');
    }
    public function getDesasByKecamatan($id_kecamatan)
    {
        $desas = Desa::where('id_kecamatan', $id_kecamatan)->get();
        return response()->json($desas);
    }
}
