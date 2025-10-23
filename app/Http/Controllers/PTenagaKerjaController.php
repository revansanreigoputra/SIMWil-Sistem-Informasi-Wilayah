<?php

namespace App\Http\Controllers;

use App\Models\PTenagaKerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PTenagaKerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pTenagaKerjas = PTenagaKerja::latest()->paginate(10);
        return view('pages.potensi.potensi-sdm.tenaga-kerja.index', compact('pTenagaKerjas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.potensi.potensi-sdm.tenaga-kerja.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'tenaga_kerja' => 'required|string|max:255',
            'jumlah_laki_laki' => 'required|integer|min:0',
            'jumlah_perempuan' => 'required|integer|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Gagal menambahkan data potensi tenaga kerja.');
        }

        $data = $request->all();
        $data['jumlah_total'] = $data['jumlah_laki_laki'] + $data['jumlah_perempuan'];

        PTenagaKerja::create($data);

        return redirect()->route('potensi.potensi-sdm.tenaga-kerja.index')->with('success', 'Data potensi tenaga kerja berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(PTenagaKerja $pTenagaKerja)
    {
        return view('pages.potensi.potensi-sdm.tenaga-kerja.show', compact('pTenagaKerja'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PTenagaKerja $pTenagaKerja)
    {
        return view('pages.potensi.potensi-sdm.tenaga-kerja.edit', compact('pTenagaKerja'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PTenagaKerja $pTenagaKerja)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'tenaga_kerja' => 'required|string|max:255',
            'jumlah_laki_laki' => 'required|integer|min:0',
            'jumlah_perempuan' => 'required|integer|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Gagal memperbarui data potensi tenaga kerja.');
        }

        $data = $request->all();
        $data['jumlah_total'] = $data['jumlah_laki_laki'] + $data['jumlah_perempuan'];

        $pTenagaKerja->update($data);

        return redirect()->route('potensi.potensi-sdm.tenaga-kerja.index')->with('success', 'Data potensi tenaga kerja berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PTenagaKerja $pTenagaKerja)
    {
        $pTenagaKerja->delete();

        return redirect()->route('potensi.potensi-sdm.tenaga-kerja.index')->with('success', 'Data potensi tenaga kerja berhasil dihapus.');
    }
}
