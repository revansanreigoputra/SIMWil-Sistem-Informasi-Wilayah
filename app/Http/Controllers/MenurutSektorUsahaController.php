<?php

namespace App\Http\Controllers;

use App\Models\MenurutSektorUsaha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\MasterPerkembangan\KomoditasSektor;

class MenurutSektorUsahaController extends Controller
{
    public function index()
    {
        $desaId = session('desa_id');

        $data = MenurutSektorUsaha::with(['desa', 'sektor'])
            ->where('id_desa', $desaId)
            ->orderBy('tanggal', 'desc')
            ->paginate(10);

        return view('pages.perkembangan.pendapatanperkapital.menurut_sektor_usaha.index', compact('data'));
    }

    public function create()
    {
        $masterSektor = KomoditasSektor::orderBy('nama')->get();

        return view(
            'pages.perkembangan.pendapatanperkapital.menurut_sektor_usaha.create',
            compact('masterSektor')
        );
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'sektor_id' => 'required|exists:komoditas_sektor,id',
            'tanggal' => 'required|date',
            'kk' => 'required|integer|min:0',
            'anggota' => 'required|integer|min:0',
            'buruh' => 'required|integer|min:0',
            'anggota_buruh' => 'required|integer|min:0',
            'pendapatan' => 'required|integer|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $request->all();
        $data['id_desa'] = session('desa_id');

        MenurutSektorUsaha::create($data);

        return redirect()->route('perkembangan.pendapatanperkapital.menurut_sektor_usaha.index')
            ->with('success', 'Data Sektor Usaha berhasil ditambahkan.');
    }

    public function show(MenurutSektorUsaha $menurut_sektor_usaha)
    {
        return view(
            'pages.perkembangan.pendapatanperkapital.menurut_sektor_usaha.show',
            compact('menurut_sektor_usaha')
        );
    }

    public function edit(MenurutSektorUsaha $menurut_sektor_usaha)
    {
        $masterSektor = KomoditasSektor::orderBy('nama')->get();

        return view(
            'pages.perkembangan.pendapatanperkapital.menurut_sektor_usaha.edit',
            compact('menurut_sektor_usaha', 'masterSektor')
        );
    }

    public function update(Request $request, MenurutSektorUsaha $menurut_sektor_usaha)
    {
        $validator = Validator::make($request->all(), [
            'sektor_id' => 'required|exists:komoditas_sektor,id',
            'tanggal' => 'required|date',
            'kk' => 'required|integer|min:0',
            'anggota' => 'required|integer|min:0',
            'buruh' => 'required|integer|min:0',
            'anggota_buruh' => 'required|integer|min:0',
            'pendapatan' => 'required|integer|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $request->all();
        $data['id_desa'] = session('desa_id');

        $menurut_sektor_usaha->update($data);

        return redirect()->route('perkembangan.pendapatanperkapital.menurut_sektor_usaha.index')
            ->with('success', 'Data Sektor Usaha berhasil diperbarui.');
    }

    public function destroy(MenurutSektorUsaha $menurut_sektor_usaha)
    {
        $menurut_sektor_usaha->delete();

        return redirect()->route('perkembangan.pendapatanperkapital.menurut_sektor_usaha.index')
            ->with('success', 'Data Sektor Usaha berhasil dihapus.');
    }
}
