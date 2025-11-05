<?php

namespace App\Http\Controllers;

use App\Models\KualitasIbuHamil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KualitasIbuHamilController extends Controller
{
    /**
     * Tampilkan daftar data Kualitas Ibu Hamil (filter sesuai desa dari session)
     */
    public function index()
    {
        $desaId = session('desa_id');

        $kualitas = KualitasIbuHamil::with('desa')
            ->where('desa_id', $desaId)
            ->latest()
            ->paginate(10);

        return view('pages.perkembangan.kesehatan-masyarakat.kualitas-ibu-hamil.index', compact('kualitas'));
    }

    /**
     * Form tambah data baru
     */
    public function create()
    {
        return view('pages.perkembangan.kesehatan-masyarakat.kualitas-ibu-hamil.create');
    }

    /**
     * Simpan data baru
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'jumlah_ibu_hamil' => 'nullable|integer|min:0',
            'total_pemeriksaan' => 'nullable|integer|min:0',
            'jumlah_melahirkan' => 'nullable|integer|min:0',
            'jumlah_kematian_ibu' => 'nullable|integer|min:0',
            'jumlah_ibu_nifas_hidup' => 'nullable|integer|min:0',
            'jumlah_ibu_nifas' => 'nullable|integer|min:0',
            'periksa_posyandu' => 'nullable|integer|min:0',
            'periksa_puskesmas' => 'nullable|integer|min:0',
            'periksa_rumah_sakit' => 'nullable|integer|min:0',
            'periksa_dokter_praktek' => 'nullable|integer|min:0',
            'periksa_bidan_praktek' => 'nullable|integer|min:0',
            'periksa_dukun_terlatih' => 'nullable|integer|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Gagal menambahkan data kualitas ibu hamil.');
        }

        $data = $validator->validated();
        $data['desa_id'] = session('desa_id'); // otomatis dari session

        KualitasIbuHamil::create($data);

        return redirect()
            ->route('perkembangan.kesehatan-masyarakat.kualitas-ibu-hamil.index')
            ->with('success', 'Data kualitas ibu hamil berhasil ditambahkan.');
    }

    /**
     * Tampilkan detail
     */
    public function show($id)
    {
        $data = KualitasIbuHamil::with('desa')->findOrFail($id);
        return view('pages.perkembangan.kesehatan-masyarakat.kualitas-ibu-hamil.show', compact('data'));
    }

    /**
     * Form edit data
     */
    public function edit(KualitasIbuHamil $kualitasIbuHamil)
{
    $data = $kualitasIbuHamil;
    return view('pages.perkembangan.kesehatan-masyarakat.kualitas-ibu-hamil.edit', compact('data'));
}


    /**
     * Update data
     */
    public function update(Request $request, KualitasIbuHamil $kualitasIbuHamil)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'jumlah_ibu_hamil' => 'nullable|integer|min:0',
            'total_pemeriksaan' => 'nullable|integer|min:0',
            'jumlah_melahirkan' => 'nullable|integer|min:0',
            'jumlah_kematian_ibu' => 'nullable|integer|min:0',
            'jumlah_ibu_nifas_hidup' => 'nullable|integer|min:0',
            'jumlah_ibu_nifas' => 'nullable|integer|min:0',
            'periksa_posyandu' => 'nullable|integer|min:0',
            'periksa_puskesmas' => 'nullable|integer|min:0',
            'periksa_rumah_sakit' => 'nullable|integer|min:0',
            'periksa_dokter_praktek' => 'nullable|integer|min:0',
            'periksa_bidan_praktek' => 'nullable|integer|min:0',
            'periksa_dukun_terlatih' => 'nullable|integer|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Gagal memperbarui data kualitas ibu hamil.');
        }

        $data = $validator->validated();
        $data['desa_id'] = session('desa_id');

        $kualitasIbuHamil->update($data);

        return redirect()
            ->route('perkembangan.kesehatan-masyarakat.kualitas-ibu-hamil.index')
            ->with('success', 'Data kualitas ibu hamil berhasil diperbarui.');
    }

    /**
     * Hapus data
     */
    public function destroy(KualitasIbuHamil $kualitasIbuHamil)
    {
        $kualitasIbuHamil->delete();

        return redirect()
            ->route('perkembangan.kesehatan-masyarakat.kualitas-ibu-hamil.index')
            ->with('success', 'Data kualitas ibu hamil berhasil dihapus.');
    }
}
