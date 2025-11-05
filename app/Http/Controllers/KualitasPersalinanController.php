<?php

namespace App\Http\Controllers;

use App\Models\KualitasPersalinan;
use App\Models\Desa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KualitasPersalinanController extends Controller
{
    /**
     * Menampilkan daftar data kualitas persalinan.
     */
    public function index()
    {
        $desaId = session('desa_id');

        $kualitas = KualitasPersalinan::with('desa')
            ->where('desa_id', $desaId)
            ->latest()
            ->paginate(10);

        return view('pages.perkembangan.kesehatan-masyarakat.kualitas-persalinan.index', compact('kualitas'));
    }

    /**
     * Form tambah data.
     */
    public function create()
    {
        // Tidak perlu kirim $desas karena dropdown tidak ditampilkan
        return view('pages.perkembangan.kesehatan-masyarakat.kualitas-persalinan.create');
    }

    /**
     * Simpan data baru.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'persalinan_rumah_sakit_umum' => 'nullable|integer|min:0',
            'persalinan_puskesmas' => 'nullable|integer|min:0',
            'persalinan_praktek_bidan' => 'nullable|integer|min:0',
            'total_persalinan' => 'nullable|integer|min:0',
            'persalinan_rumah_bersalin' => 'nullable|integer|min:0',
            'persalinan_polindes' => 'nullable|integer|min:0',
            'persalinan_balai_kesehatan_ibu_anak' => 'nullable|integer|min:0',
            'persalinan_praktek_dokter' => 'nullable|integer|min:0',
            'rumah_sendiri' => 'nullable|integer|min:0',
            'rumah_dukun' => 'nullable|integer|min:0',
            'ditolong_dokter' => 'nullable|integer|min:0',
            'ditolong_bidan' => 'nullable|integer|min:0',
            'ditolong_perawat' => 'nullable|integer|min:0',
            'ditolong_dukun_bersalin' => 'nullable|integer|min:0',
            'ditolong_keluarga' => 'nullable|integer|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Gagal menambahkan data kualitas persalinan.');
        }

        $data = $request->all();
        $data['desa_id'] = session('desa_id');

        KualitasPersalinan::create($data);

        return redirect()
            ->route('perkembangan.kesehatan-masyarakat.kualitas-persalinan.index')
            ->with('success', 'Data kualitas persalinan berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail data.
     */
    public function show($id)
    {
        $data = KualitasPersalinan::with('desa')->findOrFail($id);
        return view('pages.perkembangan.kesehatan-masyarakat.kualitas-persalinan.show', compact('data'));
    }

    /**
     * Form edit data.
     */
    public function edit(KualitasPersalinan $kualitasPersalinan)
    {
        return view('pages.perkembangan.kesehatan-masyarakat.kualitas-persalinan.edit', compact('kualitasPersalinan'));
    }

    /**
     * Update data.
     */
    public function update(Request $request, KualitasPersalinan $kualitasPersalinan)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'persalinan_rumah_sakit_umum' => 'nullable|integer|min:0',
            'persalinan_puskesmas' => 'nullable|integer|min:0',
            'persalinan_praktek_bidan' => 'nullable|integer|min:0',
            'total_persalinan' => 'nullable|integer|min:0',
            'persalinan_rumah_bersalin' => 'nullable|integer|min:0',
            'persalinan_polindes' => 'nullable|integer|min:0',
            'persalinan_balai_kesehatan_ibu_anak' => 'nullable|integer|min:0',
            'persalinan_praktek_dokter' => 'nullable|integer|min:0',
            'rumah_sendiri' => 'nullable|integer|min:0',
            'rumah_dukun' => 'nullable|integer|min:0',
            'ditolong_dokter' => 'nullable|integer|min:0',
            'ditolong_bidan' => 'nullable|integer|min:0',
            'ditolong_perawat' => 'nullable|integer|min:0',
            'ditolong_dukun_bersalin' => 'nullable|integer|min:0',
            'ditolong_keluarga' => 'nullable|integer|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Gagal memperbarui data kualitas persalinan.');
        }

        $data = $request->all();
        $data['desa_id'] = session('desa_id');

        $kualitasPersalinan->update($data);

        return redirect()
            ->route('perkembangan.kesehatan-masyarakat.kualitas-persalinan.index')
            ->with('success', 'Data kualitas persalinan berhasil diperbarui.');
    }

    /**
     * Hapus data.
     */
    public function destroy(KualitasPersalinan $kualitasPersalinan)
    {
        $kualitasPersalinan->delete();

        return redirect()
            ->route('perkembangan.kesehatan-masyarakat.kualitas-persalinan.index')
            ->with('success', 'Data kualitas persalinan berhasil dihapus.');
    }
}
