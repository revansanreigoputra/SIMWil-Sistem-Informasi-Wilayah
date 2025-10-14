<?php

namespace App\Http\Controllers;

use App\Models\KualitasIbuHamil;
use Illuminate\Http\Request;

class KualitasIbuHamilController extends Controller
{
    public function index()
    {
        $kualitas = KualitasIbuHamil::latest()->get();
        return view('pages.perkembangan.kesehatan-masyarakat.kualitas-ibu-hamil.index', compact('kualitas'));
    }

    public function create()
    {
        return view('pages.perkembangan.kesehatan-masyarakat.kualitas-ibu-hamil.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'jumlah_ibu_hamil' => 'required|integer',
            'total_pemeriksaan' => 'required|integer',
            'jumlah_melahirkan' => 'required|integer',
            'jumlah_kematian_ibu' => 'required|integer',
            'jumlah_ibu_nifas_hidup' => 'required|integer',
            'jumlah_ibu_nifas' => 'required|integer',
            'periksa_posyandu' => 'required|integer',
            'periksa_puskesmas' => 'required|integer',
            'periksa_rumah_sakit' => 'required|integer',
            'periksa_dokter_praktek' => 'required|integer',
            'periksa_bidan_praktek' => 'required|integer',
            'periksa_dukun_terlatih' => 'required|integer',
        ]);

        KualitasIbuHamil::create($request->all());

        return redirect()
            ->route('perkembangan.kesehatan-masyarakat.kualitas-ibu-hamil.index')
            ->with('success', 'Data berhasil ditambahkan');
    }

    public function show($id)
    {
        $data = KualitasIbuHamil::findOrFail($id);

        // ⛔ Cegah tampilan putih karena field null dengan default fallback
        $data->periksa_posyandu = $data->periksa_posyandu ?? 0;
        $data->periksa_puskesmas = $data->periksa_puskesmas ?? 0;
        $data->periksa_rumah_sakit = $data->periksa_rumah_sakit ?? 0;
        $data->periksa_dokter_praktek = $data->periksa_dokter_praktek ?? 0;
        $data->periksa_bidan_praktek = $data->periksa_bidan_praktek ?? 0;
        $data->periksa_dukun_terlatih = $data->periksa_dukun_terlatih ?? 0;
        $data->jumlah_ibu_nifas = $data->jumlah_ibu_nifas ?? 0;

        return view('pages.perkembangan.kesehatan-masyarakat.kualitas-ibu-hamil.show', compact('data'));
    }

   public function edit($id)
{
    // Mengubah nama variabel menjadi $data agar sesuai dengan View
    $data = KualitasIbuHamil::findOrFail($id); 
    
    // Menggunakan compact('data') atau array ['data' => $data]
    return view('pages.perkembangan.kesehatan-masyarakat.kualitas-ibu-hamil.edit', compact('data'));
}

    public function update(Request $request, $id)
    {
        $kualitas = KualitasIbuHamil::findOrFail($id);

        $request->validate([
            'tanggal' => 'required|date',
            'jumlah_ibu_hamil' => 'required|integer',
            'total_pemeriksaan' => 'required|integer',
            'jumlah_melahirkan' => 'required|integer',
            'jumlah_kematian_ibu' => 'required|integer',
            'jumlah_ibu_nifas_hidup' => 'required|integer',
            'jumlah_ibu_nifas' => 'required|integer',
            'periksa_posyandu' => 'required|integer',
            'periksa_puskesmas' => 'required|integer',
            'periksa_rumah_sakit' => 'required|integer',
            'periksa_dokter_praktek' => 'required|integer',
            'periksa_bidan_praktek' => 'required|integer',
            'periksa_dukun_terlatih' => 'required|integer',
        ]);

        $kualitas->update($request->all());

        return redirect()
            ->route('perkembangan.kesehatan-masyarakat.kualitas-ibu-hamil.index')
            ->with('success', 'Data berhasil diperbarui');
    }

    public function destroy($id)
    {
        $kualitas = KualitasIbuHamil::findOrFail($id);
        $kualitas->delete();

        return redirect()
            ->route('perkembangan.kesehatan-masyarakat.kualitas-ibu-hamil.index')
            ->with('success', 'Data berhasil dihapus');
    }
}
