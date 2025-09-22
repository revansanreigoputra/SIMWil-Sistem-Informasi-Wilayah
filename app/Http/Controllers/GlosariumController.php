<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class GlosariumController extends Controller
{
    /**
     * Dummy dataset (hanya untuk demo frontend dengan modal).
     */
    private function dummyData(): array
    {
        return [
            ['id' => 1, 'istilah' => 'Desa', 'deskripsi' => 'Wilayah administrasi setingkat kelurahan', 'diupload' => 'Admin', 'tanggal' => '2025-09-10'],
            ['id' => 2, 'istilah' => 'BPD', 'deskripsi' => 'Badan Permusyawaratan Desa', 'diupload' => 'Sekretaris', 'tanggal' => '2025-09-12'],
            ['id' => 3, 'istilah' => 'CRUD', 'deskripsi' => 'Create Read Update Delete', 'diupload' => 'Operator', 'tanggal' => '2025-09-15'],
        ];
    }

    /**
     * Tampilkan daftar glosarium dengan modal tambah & edit.
     */
    public function index()
    {
        $glosarium = $this->dummyData();
        return view('pages.utama.glosarium.index', compact('glosarium'));
    }
}
