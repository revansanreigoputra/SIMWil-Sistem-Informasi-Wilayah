<?php

namespace App\Http\Controllers;

use App\Models\DesaKelurahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DesaKelurahanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $desaKelurahans = DesaKelurahan::orderBy('tanggal', 'desc')->paginate(10);
        return view('pages.potensi.potensi-prasarana-dan-sarana.dkelurahan.index', compact('desaKelurahans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.potensi.potensi-prasarana-dan-sarana.dkelurahan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',

            // Gedung Kantor
            'gedung_kantor' => 'nullable|in:ada,tidak ada',
            'ruang_kerja' => 'nullable|integer|min:0',
            'kondisi' => 'nullable|in:baik,buruk',
            'balai_desa' => 'nullable|in:ada,tidak ada',
            'listrik' => 'nullable|in:ada,tidak ada',
            'air_bersih' => 'nullable|in:ada,tidak ada',
            'telepon' => 'nullable|in:ada,tidak ada',
            'rumah_dinas_kepala_desa' => 'nullable|in:ada,tidak ada',
            'rumah_dinas_perangkat' => 'nullable|in:ada,tidak ada',
            'fasilitas_lainnya' => 'nullable|in:ada,tidak ada',

            'mesin_tik' => 'nullable|integer|min:0',
            'meja' => 'nullable|integer|min:0',
            'kursi' => 'nullable|integer|min:0',
            'lemari_arsip' => 'nullable|integer|min:0',
            'komputer' => 'nullable|integer|min:0',
            'mesin_fax' => 'nullable|integer|min:0',
            'kendaraan_dinas' => 'nullable|integer|min:0',

            // Administrasi Pemerintahan
            'buku_data_peraturan_desa' => 'nullable|in:ada_dan_terisi,ada_dan_tidak_terisi,tidak_ada',
            'buku_keputusan_kepala_desa' => 'nullable|in:ada_dan_terisi,ada_dan_tidak_terisi,tidak_ada',
            'buku_administrasi_kependudukan' => 'nullable|in:ada_dan_terisi,ada_dan_tidak_terisi,tidak_ada',
            'buku_data_inventaris' => 'nullable|in:ada_dan_terisi,ada_dan_tidak_terisi,tidak_ada',
            'buku_data_aparat' => 'nullable|in:ada_dan_terisi,ada_dan_tidak_terisi,tidak_ada',
            'buku_data_tanah_kas_desa' => 'nullable|in:ada_dan_terisi,ada_dan_tidak_terisi,tidak_ada',
            'buku_administrasi_pajak' => 'nullable|in:ada_dan_terisi,ada_dan_tidak_terisi,tidak_ada',
            'buku_data_tanah' => 'nullable|in:ada_dan_terisi,ada_dan_tidak_terisi,tidak_ada',
            'buku_laporan_pengaduan' => 'nullable|in:ada_dan_terisi,ada_dan_tidak_terisi,tidak_ada',
            'buku_agenda_ekspedisi' => 'nullable|in:ada_dan_terisi,ada_dan_tidak_terisi,tidak_ada',
            'buku_profil_desa' => 'nullable|in:ada_dan_terisi,ada_dan_tidak_terisi,tidak_ada',
            'buku_data_induk_penduduk' => 'nullable|in:ada_dan_terisi,ada_dan_tidak_terisi,tidak_ada',
            'buku_data_mutasi_penduduk' => 'nullable|in:ada_dan_terisi,ada_dan_tidak_terisi,tidak_ada',
            'buku_rekapitulasi_penduduk' => 'nullable|in:ada_dan_terisi,ada_dan_tidak_terisi,tidak_ada',
            'buku_registrasi_pelayanan' => 'nullable|in:ada_dan_terisi,ada_dan_tidak_terisi,tidak_ada',
            'buku_data_penduduk_sementara' => 'nullable|in:ada_dan_terisi,ada_dan_tidak_terisi,tidak_ada',
            'buku_anggaran_penerimaan' => 'nullable|in:ada_dan_terisi,ada_dan_tidak_terisi,tidak_ada',
            'buku_agenda_pengeluaran' => 'nullable|in:ada_dan_terisi,ada_dan_tidak_terisi,tidak_ada',
            'buku_kas_umum' => 'nullable|in:ada_dan_terisi,ada_dan_tidak_terisi,tidak_ada',
            'buku_kas_pembantu_penerimaan' => 'nullable|in:ada_dan_terisi,ada_dan_tidak_terisi,tidak_ada',
            'buku_kas_pembantu_pengeluaran' => 'nullable|in:ada_dan_terisi,ada_dan_tidak_terisi,tidak_ada',
            'buku_lembaga_kemasyarakatan' => 'nullable|in:ada_dan_terisi,ada_dan_tidak_terisi,tidak_ada',

            // Bagian infrastruktur tambahan
            'pos_kamling' => 'nullable|in:ada,tidak ada',
            'jumlah_pos_kamling' => 'nullable|integer|min:0',
            'lapangan_olahraga' => 'nullable|in:ada,tidak ada',
            'tempat_parkir' => 'nullable|in:ada,tidak ada',
            'tahun_pembangunan' => 'nullable|integer|min:1901|max:' . date('Y'),
            'keterangan' => 'nullable|string|max:1000',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        DesaKelurahan::create($request->all());

        return redirect()->route('potensi.potensi-prasarana-dan-sarana.prasarana-dkelurahan.index')
            ->with('success', 'Data Desa/Kelurahan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(DesaKelurahan $desaKelurahan)
    {
        return view('pages.potensi.potensi-prasarana-dan-sarana.dkelurahan.show', compact('desaKelurahan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DesaKelurahan $desaKelurahan)
    {
        return view('pages.potensi.potensi-prasarana-dan-sarana.dkelurahan.edit', compact('desaKelurahan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DesaKelurahan $desaKelurahan)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',

            // Gedung Kantor
            'gedung_kantor' => 'nullable|in:ada,tidak ada',
            'ruang_kerja' => 'nullable|integer|min:0',
            'kondisi' => 'nullable|in:baik,buruk',
            'balai_desa' => 'nullable|in:ada,tidak ada',
            'listrik' => 'nullable|in:ada,tidak ada',
            'air_bersih' => 'nullable|in:ada,tidak ada',
            'telepon' => 'nullable|in:ada,tidak ada',
            'rumah_dinas_kepala_desa' => 'nullable|in:ada,tidak ada',
            'rumah_dinas_perangkat' => 'nullable|in:ada,tidak ada',
            'fasilitas_lainnya' => 'nullable|in:ada,tidak ada',

            'mesin_tik' => 'nullable|integer|min:0',
            'meja' => 'nullable|integer|min:0',
            'kursi' => 'nullable|integer|min:0',
            'lemari_arsip' => 'nullable|integer|min:0',
            'komputer' => 'nullable|integer|min:0',
            'mesin_fax' => 'nullable|integer|min:0',
            'kendaraan_dinas' => 'nullable|integer|min:0',

            // Administrasi Pemerintahan
            'buku_data_peraturan_desa' => 'nullable|in:ada_dan_terisi,ada_dan_tidak_terisi,tidak_ada',
            'buku_keputusan_kepala_desa' => 'nullable|in:ada_dan_terisi,ada_dan_tidak_terisi,tidak_ada',
            'buku_administrasi_kependudukan' => 'nullable|in:ada_dan_terisi,ada_dan_tidak_terisi,tidak_ada',
            'buku_data_inventaris' => 'nullable|in:ada_dan_terisi,ada_dan_tidak_terisi,tidak_ada',
            'buku_data_aparat' => 'nullable|in:ada_dan_terisi,ada_dan_tidak_terisi,tidak_ada',
            'buku_data_tanah_kas_desa' => 'nullable|in:ada_dan_terisi,ada_dan_tidak_terisi,tidak_ada',
            'buku_administrasi_pajak' => 'nullable|in:ada_dan_terisi,ada_dan_tidak_terisi,tidak_ada',
            'buku_data_tanah' => 'nullable|in:ada_dan_terisi,ada_dan_tidak_terisi,tidak_ada',
            'buku_laporan_pengaduan' => 'nullable|in:ada_dan_terisi,ada_dan_tidak_terisi,tidak_ada',
            'buku_agenda_ekspedisi' => 'nullable|in:ada_dan_terisi,ada_dan_tidak_terisi,tidak_ada',
            'buku_profil_desa' => 'nullable|in:ada_dan_terisi,ada_dan_tidak_terisi,tidak_ada',

            'buku_data_mutasi_penduduk' => 'nullable|in:ada_dan_terisi,ada_dan_tidak_terisi,tidak_ada',
            'buku_rekapitulasi_penduduk' => 'nullable|in:ada_dan_terisi,ada_dan_tidak_terisi,tidak_ada',
            'buku_registrasi_pelayanan' => 'nullable|in:ada_dan_terisi,ada_dan_tidak_terisi,tidak_ada',
            'buku_data_penduduk_sementara' => 'nullable|in:ada_dan_terisi,ada_dan_tidak_terisi,tidak_ada',
            'buku_anggaran_penerimaan' => 'nullable|in:ada_dan_terisi,ada_dan_tidak_terisi,tidak_ada',
            'buku_agenda_pengeluaran' => 'nullable|in:ada_dan_terisi,ada_dan_tidak_terisi,tidak_ada',
            'buku_kas_umum' => 'nullable|in:ada_dan_terisi,ada_dan_tidak_terisi,tidak_ada',
            'buku_kas_pembantu_penerimaan' => 'nullable|in:ada_dan_terisi,ada_dan_tidak_terisi,tidak_ada',
            'buku_kas_pembantu_pengeluaran' => 'nullable|in:ada_dan_terisi,ada_dan_tidak_terisi,tidak_ada',
            'buku_lembaga_kemasyarakatan' => 'nullable|in:ada_dan_terisi,ada_dan_tidak_terisi,tidak_ada',

            // Additional infrastructure fields
            'pos_kamling' => 'nullable|in:ada,tidak ada',
            'jumlah_pos_kamling' => 'nullable|integer|min:0',
            'lapangan_olahraga' => 'nullable|in:ada,tidak ada',
            'tempat_parkir' => 'nullable|in:ada,tidak ada',
            'tahun_pembangunan' => 'nullable|integer|min:1901|max:' . date('Y'),
            'keterangan' => 'nullable|string|max:1000',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $desaKelurahan->update($request->all());

        return redirect()->route('potensi.potensi-prasarana-dan-sarana.prasarana-dkelurahan.index')
            ->with('success', 'Data Desa/Kelurahan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DesaKelurahan $desaKelurahan)
    {
        $desaKelurahan->delete();

        return redirect()->route('potensi.potensi-prasarana-dan-sarana.prasarana-dkelurahan.index')
            ->with('success', 'Data Desa/Kelurahan berhasil dihapus.');
    }
}
