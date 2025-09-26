<?php

namespace App\Http\Controllers;

use App\Models\Kemasyarakatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KemasyarakatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kemasyarakatans = Kemasyarakatan::orderBy('tanggal', 'desc')->paginate(10);
        return view('pages.potensi.potensi-prasarana-dan-sarana.kemasyarakatan.index', compact('kemasyarakatans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.potensi.potensi-prasarana-dan-sarana.kemasyarakatan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            // GEDUNG KANTOR LKD/LKK
            'gedung_lembaga_kemasyarakatan' => 'nullable|in:Ada,Tidak Ada',
            'peralatan_kantor_lkd' => 'nullable|in:Ada,Tidak Ada',
            'mesin_tik_lkd' => 'nullable|in:Ada,Tidak Ada',
            'kardek_lkd' => 'nullable|in:Ada,Tidak Ada',
            'buku_administrasi_lembaga_lkd' => 'nullable|string|max:255',
            'jumlah_meja_kursi_lkd' => 'nullable|string|max:255',
            'lainnya_lkd' => 'nullable|in:Ada,Tidak Ada',
            // LKMD / LPM
            'memiliki_kantor_sendiri' => 'nullable|in:Ada,Tidak Ada',
            'peralatan_kantor_lpm' => 'nullable|in:Ada,Tidak Ada',
            'mesin_tik_lpm' => 'nullable|in:Ada,Tidak Ada',
            'kardek_lpm' => 'nullable|in:Ada,Tidak Ada',
            'buku_administrasi_lembaga_lpm' => 'nullable|string|max:255',
            'jumlah_meja_kursi_lpm' => 'nullable|string|max:255',
            'buku_administrasi_lpm' => 'nullable|string|max:255',
            'jumlah_kegiatan_lpm' => 'nullable|string|max:255',
            'lainnya_lpm' => 'nullable|in:Ada,Tidak Ada',
            // PKK
            'pkk' => 'nullable|in:Ada,Tidak Ada',
            'gedung_kantor_pkk' => 'nullable|in:Ada,Tidak Ada',
            'peralatan_kantor_pkk' => 'nullable|in:Ada,Tidak Ada',
            'kepengurusan_pkk' => 'nullable|in:Ada,Tidak Ada',
            'buku_administrasi_pkk' => 'nullable|string|max:255',
            'kegiatan_pkk' => 'nullable|in:Ada,Tidak Ada',
            'jumlah_kegiatan_pkk' => 'nullable|string|max:255',
            'kelengkapan_darmawisata_pkk' => 'nullable|in:Ada,Tidak Ada',
            'kelengkapan_pokja_pkk' => 'nullable|in:Ada,Tidak Ada',
            // Karang Taruna
            'karang_taruna' => 'nullable|in:Ada,Tidak Ada',
            'kepengurusan_karang' => 'nullable|in:Ada,Tidak Ada',
            'buku_administrasi_karang' => 'nullable|string|max:255',
            'jumlah_kegiatan_karang' => 'nullable|string|max:255',
            'lainnya_karang' => 'nullable|in:Ada,Tidak Ada',
            // Rukun Tangga
            'rukun_tangga' => 'nullable|in:Ada,Tidak Ada',
            'kepengurusan_rt' => 'nullable|in:Ada,Tidak Ada',
            'buku_administrasi_rt' => 'nullable|string|max:255',
            'jumlah_kegiatan_rt' => 'nullable|string|max:255',
            // Rukun Warga
            'rukun_warga' => 'nullable|in:Ada,Tidak Ada',
            'kepengurusan_rw' => 'nullable|in:Ada,Tidak Ada',
            'buku_administrasi_rw' => 'nullable|string|max:255',
            'jumlah_kegiatan_rw' => 'nullable|string|max:255',
            'lainnya_rw' => 'nullable|in:Ada,Tidak Ada',
            // Lembaga Adat
            'lembaga_adat' => 'nullable|in:Ada,Tidak Ada',
            'gedung_kantor_adat' => 'nullable|in:Ada,Tidak Ada',
            'kepengurusan_adat' => 'nullable|in:Ada,Tidak Ada',
            'buku_administrasi_adat' => 'nullable|string|max:255',
            'jumlah_kegiatan_adat' => 'nullable|string|max:255',
            // BUMDes
            'bumdes' => 'nullable|in:Ada,Tidak Ada',
            'gedung_kantor_bumdes' => 'nullable|in:Ada,Tidak Ada',
            'kepengurusan_bumdes' => 'nullable|in:Ada,Tidak Ada',
            'buku_administrasi_bumdes' => 'nullable|string|max:255',
            'jumlah_kegiatan_bumdes' => 'nullable|string|max:255',
            // Forum Komunikasi Kader Pemberdayaan Masyarakat
            'forum_komunikasi_kader' => 'nullable|in:Ada,Tidak Ada',
            'gedung_kantor_forum' => 'nullable|in:Ada,Tidak Ada',
            'kepengurusan_forum' => 'nullable|in:Ada,Tidak Ada',
            'buku_administrasi_forum' => 'nullable|string|max:255',
            'jumlah_kegiatan_forum' => 'nullable|string|max:255',
            'lainnya_forum' => 'nullable|in:Ada,Tidak Ada',
            // Lain-lain
            'gedung_kantor_sosial_lain' => 'nullable|in:Ada,Tidak Ada',
            'gedung_kantor_profesi_lain' => 'nullable|in:Ada,Tidak Ada',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        Kemasyarakatan::create($request->all());

        return redirect()->route('potensi.potensi-prasarana-dan-sarana.kemasyarakatan.index')
            ->with('success', 'Data Kemasyarakatan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kemasyarakatan $kemasyarakatan)
    {
        return view('pages.potensi.potensi-prasarana-dan-sarana.kemasyarakatan.show', compact('kemasyarakatan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kemasyarakatan $kemasyarakatan)
    {
        return view('pages.potensi.potensi-prasarana-dan-sarana.kemasyarakatan.edit', compact('kemasyarakatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kemasyarakatan $kemasyarakatan)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            // GEDUNG KANTOR LKD/LKK
            'gedung_lembaga_kemasyarakatan' => 'nullable|in:Ada,Tidak Ada',
            'peralatan_kantor_lkd' => 'nullable|in:Ada,Tidak Ada',
            'mesin_tik_lkd' => 'nullable|in:Ada,Tidak Ada',
            'kardek_lkd' => 'nullable|in:Ada,Tidak Ada',
            'buku_administrasi_lembaga_lkd' => 'nullable|string|max:255',
            'jumlah_meja_kursi_lkd' => 'nullable|string|max:255',
            'lainnya_lkd' => 'nullable|in:Ada,Tidak Ada',
            // LKMD / LPM
            'memiliki_kantor_sendiri' => 'nullable|in:Ada,Tidak Ada',
            'peralatan_kantor_lpm' => 'nullable|in:Ada,Tidak Ada',
            'mesin_tik_lpm' => 'nullable|in:Ada,Tidak Ada',
            'kardek_lpm' => 'nullable|in:Ada,Tidak Ada',
            'buku_administrasi_lembaga_lpm' => 'nullable|string|max:255',
            'jumlah_meja_kursi_lpm' => 'nullable|string|max:255',
            'buku_administrasi_lpm' => 'nullable|string|max:255',
            'jumlah_kegiatan_lpm' => 'nullable|string|max:255',
            'lainnya_lpm' => 'nullable|in:Ada,Tidak Ada',
            // PKK
            'pkk' => 'nullable|in:Ada,Tidak Ada',
            'gedung_kantor_pkk' => 'nullable|in:Ada,Tidak Ada',
            'peralatan_kantor_pkk' => 'nullable|in:Ada,Tidak Ada',
            'kepengurusan_pkk' => 'nullable|in:Ada,Tidak Ada',
            'buku_administrasi_pkk' => 'nullable|string|max:255',
            'kegiatan_pkk' => 'nullable|in:Ada,Tidak Ada',
            'jumlah_kegiatan_pkk' => 'nullable|string|max:255',
            'kelengkapan_darmawisata_pkk' => 'nullable|in:Ada,Tidak Ada',
            'kelengkapan_pokja_pkk' => 'nullable|in:Ada,Tidak Ada',
            // Karang Taruna
            'karang_taruna' => 'nullable|in:Ada,Tidak Ada',
            'kepengurusan_karang' => 'nullable|in:Ada,Tidak Ada',
            'buku_administrasi_karang' => 'nullable|string|max:255',
            'jumlah_kegiatan_karang' => 'nullable|string|max:255',
            'lainnya_karang' => 'nullable|in:Ada,Tidak Ada',
            // Rukun Tangga
            'rukun_tangga' => 'nullable|in:Ada,Tidak Ada',
            'kepengurusan_rt' => 'nullable|in:Ada,Tidak Ada',
            'buku_administrasi_rt' => 'nullable|string|max:255',
            'jumlah_kegiatan_rt' => 'nullable|string|max:255',
            // Rukun Warga
            'rukun_warga' => 'nullable|in:Ada,Tidak Ada',
            'kepengurusan_rw' => 'nullable|in:Ada,Tidak Ada',
            'buku_administrasi_rw' => 'nullable|string|max:255',
            'jumlah_kegiatan_rw' => 'nullable|string|max:255',
            'lainnya_rw' => 'nullable|in:Ada,Tidak Ada',
            // Lembaga Adat
            'lembaga_adat' => 'nullable|in:Ada,Tidak Ada',
            'gedung_kantor_adat' => 'nullable|in:Ada,Tidak Ada',
            'kepengurusan_adat' => 'nullable|in:Ada,Tidak Ada',
            'buku_administrasi_adat' => 'nullable|string|max:255',
            'jumlah_kegiatan_adat' => 'nullable|string|max:255',
            // BUMDes
            'bumdes' => 'nullable|in:Ada,Tidak Ada',
            'gedung_kantor_bumdes' => 'nullable|in:Ada,Tidak Ada',
            'kepengurusan_bumdes' => 'nullable|in:Ada,Tidak Ada',
            'buku_administrasi_bumdes' => 'nullable|string|max:255',
            'jumlah_kegiatan_bumdes' => 'nullable|string|max:255',
            // Forum Komunikasi Kader Pemberdayaan Masyarakat
            'forum_komunikasi_kader' => 'nullable|in:Ada,Tidak Ada',
            'gedung_kantor_forum' => 'nullable|in:Ada,Tidak Ada',
            'kepengurusan_forum' => 'nullable|in:Ada,Tidak Ada',
            'buku_administrasi_forum' => 'nullable|string|max:255',
            'jumlah_kegiatan_forum' => 'nullable|string|max:255',
            'lainnya_forum' => 'nullable|in:Ada,Tidak Ada',
            // Lain-lain
            'gedung_kantor_sosial_lain' => 'nullable|in:Ada,Tidak Ada',
            'gedung_kantor_profesi_lain' => 'nullable|in:Ada,Tidak Ada',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $kemasyarakatan->update($request->all());

        return redirect()->route('potensi.potensi-prasarana-dan-sarana.kemasyarakatan.index')
            ->with('success', 'Data Kemasyarakatan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kemasyarakatan $kemasyarakatan)
    {
        $kemasyarakatan->delete();

        return redirect()->route('potensi.potensi-prasarana-dan-sarana.kemasyarakatan.index')
            ->with('success', 'Data Kemasyarakatan berhasil dihapus.');
    }
}