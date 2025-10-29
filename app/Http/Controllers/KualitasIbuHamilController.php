<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\KualitasIbuHamil;
use Illuminate\Http\Request;

class KualitasIbuHamilController extends Controller
{
    /**
     * Menampilkan daftar data kualitas ibu hamil per desa.
     */
    public function index()
    {
        // Ambil desa_id dari session login
        $desaId = session('desa_id') ?? auth()->user()->desa_id ?? null;

        // Jika admin kabupaten tidak pilih desa, tampilkan kosong
        if (!$desaId && auth()->user()->role != 'admin_kabupaten') {
            return redirect()->back()->with('error', 'Silakan pilih desa terlebih dahulu.');
        }

        // Filter data berdasarkan desa aktif
        $kualitas = KualitasIbuHamil::with('desa')
            ->when($desaId, fn($q) => $q->where('desa_id', $desaId))
            ->latest()
            ->get();

        return view('pages.perkembangan.kesehatan-masyarakat.kualitas-ibu-hamil.index', compact('kualitas'));
    }

    /**
     * Form tambah data kualitas ibu hamil.
     */
   public function create()
{
    $desas = Desa::all();
    return view('pages.perkembangan.kesehatan-masyarakat.kualitas-ibu-hamil.create', compact('desas'));
}

    /**
     * Simpan data baru kualitas ibu hamil.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'jumlah_ibu_hamil' => 'nullable|integer',
            'total_pemeriksaan' => 'nullable|integer',
            'jumlah_melahirkan' => 'nullable|integer',
            'jumlah_kematian_ibu' => 'nullable|integer',
            'jumlah_ibu_nifas_hidup' => 'nullable|integer',
            'jumlah_ibu_nifas' => 'nullable|integer',
            'periksa_posyandu' => 'nullable|integer',
            'periksa_puskesmas' => 'nullable|integer',
            'periksa_rumah_sakit' => 'nullable|integer',
            'periksa_dokter_praktek' => 'nullable|integer',
            'periksa_bidan_praktek' => 'nullable|integer',
            'periksa_dukun_terlatih' => 'nullable|integer',
        ]);

        $desaId = session('desa_id') ?? auth()->user()->desa_id;

        if (is_null($desaId)) {
            return redirect()->back()->with('error', 'Akses ditolak: tidak ada desa aktif.');
        }

        KualitasIbuHamil::create(array_merge($request->all(), [
            'desa_id' => $desaId,
        ]));

        return redirect()->route('perkembangan.kesehatan-masyarakat.kualitas-ibu-hamil.index')
            ->with('success', 'Data berhasil ditambahkan.');
    }

    /**
     * Form edit data.
     */
    public function edit($id)
    {
        $desaId = session('desa_id') ?? auth()->user()->desa_id;
        $data = KualitasIbuHamil::where('id', $id)
            ->when($desaId, fn($q) => $q->where('desa_id', $desaId))
            ->firstOrFail();

        return view('pages.perkembangan.kesehatan-masyarakat.kualitas-ibu-hamil.edit', compact('data'));
    }

    /**
     * Update data kualitas ibu hamil.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'jumlah_ibu_hamil' => 'nullable|integer',
            'total_pemeriksaan' => 'nullable|integer',
            'jumlah_melahirkan' => 'nullable|integer',
            'jumlah_kematian_ibu' => 'nullable|integer',
            'jumlah_ibu_nifas_hidup' => 'nullable|integer',
            'jumlah_ibu_nifas' => 'nullable|integer',
            'periksa_posyandu' => 'nullable|integer',
            'periksa_puskesmas' => 'nullable|integer',
            'periksa_rumah_sakit' => 'nullable|integer',
            'periksa_dokter_praktek' => 'nullable|integer',
            'periksa_bidan_praktek' => 'nullable|integer',
            'periksa_dukun_terlatih' => 'nullable|integer',
        ]);

        $desaId = session('desa_id') ?? auth()->user()->desa_id;
        $data = KualitasIbuHamil::where('id', $id)
            ->when($desaId, fn($q) => $q->where('desa_id', $desaId))
            ->firstOrFail();

        $data->update(array_merge($request->all(), [
            'desa_id' => $desaId,
        ]));

        return redirect()->route('perkembangan.kesehatan-masyarakat.kualitas-ibu-hamil.index')
            ->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Hapus data kualitas ibu hamil.
     */
    public function destroy($id)
    {
        $desaId = session('desa_id') ?? auth()->user()->desa_id;
        $data = KualitasIbuHamil::where('id', $id)
            ->when($desaId, fn($q) => $q->where('desa_id', $desaId))
            ->firstOrFail();

        $data->delete();

        return redirect()->route('perkembangan.kesehatan-masyarakat.kualitas-ibu-hamil.index')
            ->with('success', 'Data berhasil dihapus.');
    }

    public function show($id)
{
    $desaId = session('desa_id') ?? auth()->user()->desa_id;

    $data = KualitasIbuHamil::with('desa')
        ->when($desaId, fn($q) => $q->where('desa_id', $desaId))
        ->findOrFail($id);

    return view('pages.perkembangan.kesehatan-masyarakat.kualitas-ibu-hamil.show', compact('data'));
}

}

