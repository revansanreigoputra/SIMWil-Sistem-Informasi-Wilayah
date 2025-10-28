<?php

namespace App\Http\Controllers;

use App\Models\MenurutSektorUsaha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MenurutSektorUsahaController extends Controller
{
    /**
     * Tampilkan daftar data sektor usaha berdasarkan desa login.
     */
    public function index()
    {
        $desaId = session('desa_id');

        $data = MenurutSektorUsaha::with('desa')
            ->where('id_desa', $desaId) // ✅ disesuaikan dengan nama kolom di database
            ->orderBy('tanggal', 'desc')
            ->paginate(10);

        return view('pages.perkembangan.pendapatanperkapital.menurut_sektor_usaha.index', compact('data'));
    }

    /**
     * Form tambah data baru.
     */
    public function create()
    {
        return view('pages.perkembangan.pendapatanperkapital.menurut_sektor_usaha.create');
    }

    /**
     * Simpan data baru ke database.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'kk' => 'required|integer|min:0',
            'anggota' => 'required|integer|min:0',
            'buruh' => 'required|integer|min:0',
            'anggota_buruh' => 'required|integer|min:0',
            'pendapatan' => 'required|integer|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->all();
        $data['id_desa'] = session('desa_id'); // ✅ ganti dari desa_id ke id_desa

        MenurutSektorUsaha::create($data);

        return redirect()->route('perkembangan.pendapatanperkapital.menurut_sektor_usaha.index')
            ->with('success', 'Data Sektor Usaha berhasil ditambahkan.');
    }

    /**
     * Tampilkan detail data.
     */
    public function show(MenurutSektorUsaha $menurut_sektor_usaha)
    {
        return view('pages.perkembangan.pendapatanperkapital.menurut_sektor_usaha.show', compact('menurut_sektor_usaha'));
    }

    /**
     * Form edit data.
     */
    public function edit(MenurutSektorUsaha $menurut_sektor_usaha)
    {
        return view('pages.perkembangan.pendapatanperkapital.menurut_sektor_usaha.edit', compact('menurut_sektor_usaha'));
    }

    /**
     * Update data di database.
     */
    public function update(Request $request, MenurutSektorUsaha $menurut_sektor_usaha)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'kk' => 'required|integer|min:0',
            'anggota' => 'required|integer|min:0',
            'buruh' => 'required|integer|min:0',
            'anggota_buruh' => 'required|integer|min:0',
            'pendapatan' => 'required|integer|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->all();
        $data['id_desa'] = session('desa_id'); // ✅ sesuaikan

        $menurut_sektor_usaha->update($data);

        return redirect()->route('perkembangan.pendapatanperkapital.menurut_sektor_usaha.index')
            ->with('success', 'Data Sektor Usaha berhasil diperbarui.');
    }

    /**
     * Hapus data.
     */
    public function destroy(MenurutSektorUsaha $menurut_sektor_usaha)
    {
        $menurut_sektor_usaha->delete();

        return redirect()->route('perkembangan.pendapatanperkapital.menurut_sektor_usaha.index')
            ->with('success', 'Data Sektor Usaha berhasil dihapus.');
    }
}
