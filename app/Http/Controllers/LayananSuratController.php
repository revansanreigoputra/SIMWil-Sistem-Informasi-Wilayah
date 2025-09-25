<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LayananSuratController extends Controller
{
    // ==== TEMPLATE SURAT ====

    public function templateKopSurat()
    {
        return view('pages.layanan.template.kop_surat.index');
    }

    public function editKopSurat()
    {
        return view('pages.layanan.template.kop_surat.edit');
    }

    public function templateKopLaporan()
    {
        return view('pages.layanan.template.kop_laporan.index');
    }

    public function editKopLaporan()
    {
        return view('pages.layanan.template.kop_laporan.edit');
    }

    public function templateFormatNomor()
    {
        return view('pages.layanan.template.format_nomor.index');
    }
    
    public function editFormatNomor()
    {
        return view('pages.layanan.template.format_nomor.edit');
    }

    // ==== PERMOHONAN SURAT ====
    public function index()
    {
        return view('pages.layanan.permohonan.index');
    }

    public function create(Request $request)
    {
        $jenis = $request->query('jenis');
        return view('pages.layanan.permohonan.create', compact('jenis'));
    }

    public function edit($id)
    {
        return view('pages.layanan.permohonan.edit', compact('id'));
    }

    public function delete($id)
    {
        return view('pages.layanan.permohonan.delete', compact('id'));
    }
   public function cetak($jenis)
    {
        // Pastikan nama view sesuai folder
        $viewPath = "pages.layanan.permohonan.cetak.$jenis";

        // Cek apakah file view ada
        if (view()->exists($viewPath)) {return view($viewPath);
    }

        // Kalau view tidak ada, lempar error
        abort(404, "Template cetak untuk surat $jenis tidak ditemukan.");
    }


    // ==== PROFIL DESA ====

    public function profilDesa()
    {
        return view('pages.layanan.profil_desa.index');
    }

    public function showProfilDesa()
    {
        return view('pages.layanan.profil_desa.show');
    }

    public function editProfilDesa()
    {
        return view('pages.layanan.profil_desa.edit');
    }
    // ==== LAPORAN SURAT ====
    public function indexSurat(Request $request)
    {
        $laporan = [];

        if ($request->has('tanggal') || $request->has('jenis') || $request->has('ttd')) {
            $laporan = Surat::query()
                ->when($request->tanggal, fn($q) => $q->whereDate('tanggal', $request->tanggal))
                ->when($request->jenis, fn($q) => $q->where('jenis', $request->jenis))
                ->when($request->ttd, fn($q) => $q->where('ttd', $request->ttd))
                ->get();
        }

        return view('pages.layanan.laporan.surat.index', compact('laporan'));
    }

    public function cetakSurat($id)
    {
        // tampilan cetak dummy
        return view('pages.layanan.laporan.surat.cetak', compact('id'));
    }
}