<?php

namespace App\Http\Controllers;

use App\Models\CakupanAirBersih;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CakupanAirBersihController extends Controller
{
    // Mengikuti pola CakupanImunisasiController
    public function index()
    {
        // Mendapatkan desa_id dari session, diasumsikan user sudah login
        $desaId = session('desa_id');
        
        // Mengambil data cakupan air bersih, relasi dengan desa, filtering berdasarkan desa_id, dan pagination
        $cakupan = CakupanAirBersih::with('desa')
                                 ->where('desa_id', $desaId)
                                 ->latest()
                                 ->paginate(10);

        // Mengirim data ke view index
        return view('pages.perkembangan.kesehatan-masyarakat.cakupan-air-bersih.index', compact('cakupan'));
    }

    // Mengikuti pola CakupanImunisasiController
    public function create()
    {
        // Tidak perlu kirim $desas karena dropdown tidak ditampilkan (asumsi desa_id diambil dari session)
        return view('pages.perkembangan.kesehatan-masyarakat.cakupan-air-bersih.create');
    }

    // Mengikuti pola CakupanImunisasiController
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'sumur_gali' => 'nullable|integer|min:0',
            'pelanggan_pam' => 'nullable|integer|min:0',
            'penampung_air_hujan' => 'nullable|integer|min:0',
            'sumur_pompa' => 'nullable|integer|min:0',
            'perpipaan_air_kran' => 'nullable|integer|min:0',
            'hidran_umum' => 'nullable|integer|min:0',
            'air_sungai' => 'nullable|integer|min:0',
            'embung' => 'nullable|integer|min:0',
            'mata_air' => 'nullable|integer|min:0',
            'tidak_akses_air_laut' => 'nullable|integer|min:0',
            'tidak_akses_sumber_lain' => 'nullable|integer|min:0',
            'total_keluarga' => 'nullable|integer|min:0', // Kolom tambahan dari form create
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Gagal menambahkan data cakupan air bersih.');
        }

        $data = $request->all();
        // Set desa_id dari session
        $data['desa_id'] = session('desa_id'); 

        CakupanAirBersih::create($data);

        return redirect()
            ->route('perkembangan.kesehatan-masyarakat.cakupan-air-bersih.index')
            ->with('success', 'Data Cakupan Air Bersih berhasil ditambahkan.');
    }

    // Methods show, edit, update, dan destroy disiapkan sesuai RESTful resource
    public function show(CakupanAirBersih $cakupanAirBersih)
    {
        return view('pages.perkembangan.kesehatan-masyarakat.cakupan-air-bersih.show', compact('cakupanAirBersih'));
    }

    public function edit(CakupanAirBersih $cakupanAirBersih)
    {
        return view('pages.perkembangan.kesehatan-masyarakat.cakupan-air-bersih.edit', compact('cakupanAirBersih'));
    }

    public function update(Request $request, CakupanAirBersih $cakupanAirBersih)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'sumur_gali' => 'nullable|integer|min:0',
            'pelanggan_pam' => 'nullable|integer|min:0',
            'penampung_air_hujan' => 'nullable|integer|min:0',
            'sumur_pompa' => 'nullable|integer|min:0',
            'perpipaan_air_kran' => 'nullable|integer|min:0',
            'hidran_umum' => 'nullable|integer|min:0',
            'air_sungai' => 'nullable|integer|min:0',
            'embung' => 'nullable|integer|min:0',
            'mata_air' => 'nullable|integer|min:0',
            'tidak_akses_air_laut' => 'nullable|integer|min:0',
            'tidak_akses_sumber_lain' => 'nullable|integer|min:0',
            'total_keluarga' => 'nullable|integer|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Gagal memperbarui data cakupan air bersih.');
        }

        $data = $request->all();
        $data['desa_id'] = session('desa_id');

        $cakupanAirBersih->update($data);

        return redirect()
            ->route('perkembangan.kesehatan-masyarakat.cakupan-air-bersih.index')
            ->with('success', 'Data Cakupan Air Bersih berhasil diperbarui.');
    }

    public function destroy(CakupanAirBersih $cakupanAirBersih)
    {
        $cakupanAirBersih->delete();

        return redirect()
            ->route('perkembangan.kesehatan-masyarakat.cakupan-air-bersih.index')
            ->with('success', 'Data Cakupan Air Bersih berhasil dihapus.');
    }
}