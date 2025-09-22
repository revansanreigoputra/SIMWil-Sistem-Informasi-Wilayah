<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class AgendaController extends Controller
{
    public function index()
    {
        $agenda = [
            ['id' => 1, 'tgl_dari' => '2025-09-20', 'tgl_sampai' => '2025-09-21', 'lokasi' => 'Balai Desa Sukamaju', 'kegiatan' => 'Musyawarah Desa', 'peserta' => 'Perangkat Desa & Warga', 'diupload' => 'Admin', 'tanggal' => '2025-09-17'],
            ['id' => 2, 'tgl_dari' => '2025-09-25', 'tgl_sampai' => '2025-09-25', 'lokasi' => 'Kecamatan Harapan', 'kegiatan' => 'Rapat Koordinasi', 'peserta' => 'Camat & Kepala Desa', 'diupload' => 'Operator', 'tanggal' => '2025-09-16'],
        ];

        return view('pages.utama.agenda.index', compact('agenda'));
    }

    public function create()
    {
        return view('pages.utama.agenda.create');
    }

    public function edit($id)
    {
        $data = [
            'id' => $id,
            'tgl_dari' => '2025-09-20',
            'tgl_sampai' => '2025-09-21',
            'lokasi' => 'Balai Desa Sukamaju',
            'kegiatan' => 'Musyawarah Desa',
            'peserta' => 'Perangkat Desa & Warga',
        ];

        return view('pages.utama.agenda.edit', compact('data'));
    }
}
