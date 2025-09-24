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
    public function cetak($id)
    {
    return view('pages.layanan.permohonan.cetak', compact('id'));
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
}