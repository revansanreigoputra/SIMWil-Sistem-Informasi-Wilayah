<?php

namespace App\Http\Controllers;

use App\Models\Topografi;
use Illuminate\Http\Request;

class TopografiController extends Controller
{
    public function index()
    {
        $desaId = session('desa_id');
        $topografis = Topografi::with('desa')->where('desa_id', $desaId)->latest()->get();
        return view('pages.potensi.sda.topografi.index', compact('topografis'));
    }

    public function create()
    {
        return view('pages.potensi.sda.topografi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'dataran_rendah' => 'required|numeric|min:0',
            'berbukit_bukit' => 'required|numeric|min:0',
            'dataran' => 'required|numeric|min:0',
            'lereng_gunung' => 'required|numeric|min:0',
            'tepi_pantai_pesisir' => 'required|numeric|min:0',
            'kawasan_rawa' => 'required|numeric|min:0',
            'kawasan_gambut' => 'required|numeric|min:0',
            'aliran_sungai' => 'required|numeric|min:0',
            'bantaran_sungai' => 'required|numeric|min:0',
            'lain_lain' => 'required|numeric|min:0',
            'kawasan_perkantoran' => 'required|numeric|min:0',
            'kawasan_pertokoan' => 'required|numeric|min:0',
            'kawasan_campuran' => 'required|numeric|min:0',
            'kawasan_industri' => 'required|numeric|min:0',
            'kepulauan' => 'required|numeric|min:0',
            'pantai_pesisir' => 'required|numeric|min:0',
            'kawasan_hutan' => 'required|numeric|min:0',
            'taman_suaka' => 'required|numeric|min:0',
            'kawasan_wisata' => 'required|numeric|min:0',
            'perbatasan_negara' => 'required|numeric|min:0',
            'perbatasan_provinsi' => 'required|numeric|min:0',
            'perbatasan_kabupaten' => 'required|numeric|min:0',
            'perbatasan_kecamatan' => 'required|numeric|min:0',
            'das_bantaran_sungai' => 'required|numeric|min:0',
            'rawan_banjir' => 'required|numeric|min:0',
            'bebas_banjir' => 'required|numeric|min:0',
            'potensial_tsunami' => 'required|numeric|min:0',
            'rawan_gempa' => 'required|numeric|min:0',
            'jarak_ke_kecamatan' => 'required|numeric|min:0',
            'lama_bermotor_kecamatan' => 'required|numeric|min:0',
            'lama_non_bermotor_kecamatan' => 'required|numeric|min:0',
            'kendaraan_umum_kecamatan' => 'required|integer|min:0',
            'jarak_ke_kabupaten' => 'required|numeric|min:0',
            'lama_bermotor_kabupaten' => 'required|numeric|min:0',
            'lama_non_bermotor_kabupaten' => 'required|numeric|min:0',
            'kendaraan_umum_kabupaten' => 'required|integer|min:0',
            'jarak_ke_provinsi' => 'required|numeric|min:0',
            'lama_bermotor_provinsi' => 'required|numeric|min:0',
            'lama_non_bermotor_provinsi' => 'required|numeric|min:0',
            'kendaraan_umum_provinsi' => 'required|integer|min:0',
        ]);

        $data = $request->all();
        $data['desa_id'] = session('desa_id');

        Topografi::create($data);

        return redirect()->route('topografi.index')->with('success', 'Data topografi berhasil ditambahkan.');
    }

    public function show(Topografi $topografi)
    {
        return view('pages.potensi.sda.topografi.show', compact('topografi'));
    }

    public function edit(Topografi $topografi)
    {
        return view('pages.potensi.sda.topografi.edit', compact('topografi'));
    }

    public function update(Request $request, Topografi $topografi)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'dataran_rendah' => 'required|numeric|min:0',
            'berbukit_bukit' => 'required|numeric|min:0',
            'dataran' => 'required|numeric|min:0',
            'lereng_gunung' => 'required|numeric|min:0',
            'tepi_pantai_pesisir' => 'required|numeric|min:0',
            'kawasan_rawa' => 'required|numeric|min:0',
            'kawasan_gambut' => 'required|numeric|min:0',
            'aliran_sungai' => 'required|numeric|min:0',
            'bantaran_sungai' => 'required|numeric|min:0',
            'lain_lain' => 'required|numeric|min:0',
            'kawasan_perkantoran' => 'required|numeric|min:0',
            'kawasan_pertokoan' => 'required|numeric|min:0',
            'kawasan_campuran' => 'required|numeric|min:0',
            'kawasan_industri' => 'required|numeric|min:0',
            'kepulauan' => 'required|numeric|min:0',
            'pantai_pesisir' => 'required|numeric|min:0',
            'kawasan_hutan' => 'required|numeric|min:0',
            'taman_suaka' => 'required|numeric|min:0',
            'kawasan_wisata' => 'required|numeric|min:0',
            'perbatasan_negara' => 'required|numeric|min:0',
            'perbatasan_provinsi' => 'required|numeric|min:0',
            'perbatasan_kabupaten' => 'required|numeric|min:0',
            'perbatasan_kecamatan' => 'required|numeric|min:0',
            'das_bantaran_sungai' => 'required|numeric|min:0',
            'rawan_banjir' => 'required|numeric|min:0',
            'bebas_banjir' => 'required|numeric|min:0',
            'potensial_tsunami' => 'required|numeric|min:0',
            'rawan_gempa' => 'required|numeric|min:0',
            'jarak_ke_kecamatan' => 'required|numeric|min:0',
            'lama_bermotor_kecamatan' => 'required|numeric|min:0',
            'lama_non_bermotor_kecamatan' => 'required|numeric|min:0',
            'kendaraan_umum_kecamatan' => 'required|integer|min:0',
            'jarak_ke_kabupaten' => 'required|numeric|min:0',
            'lama_bermotor_kabupaten' => 'required|numeric|min:0',
            'lama_non_bermotor_kabupaten' => 'required|numeric|min:0',
            'kendaraan_umum_kabupaten' => 'required|integer|min:0',
            'jarak_ke_provinsi' => 'required|numeric|min:0',
            'lama_bermotor_provinsi' => 'required|numeric|min:0',
            'lama_non_bermotor_provinsi' => 'required|numeric|min:0',
            'kendaraan_umum_provinsi' => 'required|integer|min:0',
        ]);

        $topografi->update($request->all());

        return redirect()->route('topografi.index')->with('success', 'Data topografi berhasil diubah.');
    }

    public function destroy(Topografi $topografi)
    {
        $topografi->delete();
        return redirect()->route('topografi.index')->with('success', 'Data topografi berhasil dihapus.');
    }
}