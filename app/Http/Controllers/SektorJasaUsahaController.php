<?php

namespace App\Http\Controllers;

use App\Models\MasterDDK\MataPencaharian;
use App\Models\SektorJasaUsaha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SektorJasaUsahaController extends Controller
{
    public function index()
    {
        $desaId = session('desa_id');

        $data = SektorJasaUsaha::with(['desa', 'mataPencaharian'])
                ->where('desa_id', $desaId)
                ->latest()
                ->paginate(10);

        $mataPencaharians = MataPencaharian::all();

        return view('pages.perkembangan.struktur-mata-pencaharian.sektor-jasa-usaha.index', compact('data', 'mataPencaharians'));
    }

    public function create()
    {
        $mataPencaharians = MataPencaharian::orderBy('mata_pencaharian')->get();

        return view('pages.perkembangan.struktur-mata-pencaharian.sektor-jasa-usaha.create', compact('mataPencaharians'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'mata_pencaharian_id' => 'required|exists:mata_pencaharians,id',
            'jumlah' => 'required|integer|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Gagal menambahkan data sektor jasa usaha.');
        }

        $data = $request->all();
        $data['desa_id'] = session('desa_id');

        SektorJasaUsaha::create($data);

        return redirect()
            ->route('perkembangan.struktur-mata-pencaharian.sektor-jasa-usaha.index')
            ->with('success', 'Data sektor jasa usaha berhasil ditambahkan.');
    }

    // agar konsisten dengan edit di SektorIndustriKecilController
    public function edit($id)
    {
        $data = SektorJasaUsaha::findOrFail($id);
        $mataPencaharians = MataPencaharian::all();

        return view('pages.perkembangan.struktur-mata-pencaharian.sektor-jasa-usaha.edit', compact('data', 'mataPencaharians'));
    }

    public function update(Request $request, SektorJasaUsaha $sektorJasaUsaha)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'mata_pencaharian_id' => 'required|exists:mata_pencaharians,id',
            'jumlah' => 'required|integer|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Gagal memperbarui data sektor jasa usaha.');
        }

        $data = $request->all();
        $data['desa_id'] = session('desa_id');

        $sektorJasaUsaha->update($data);

        return redirect()
            ->route('perkembangan.struktur-mata-pencaharian.sektor-jasa-usaha.index')
            ->with('success', 'Data sektor jasa usaha berhasil diperbarui.');
    }

    public function destroy(SektorJasaUsaha $sektorJasaUsaha)
    {
        $sektorJasaUsaha->delete();

        return redirect()
            ->route('perkembangan.struktur-mata-pencaharian.sektor-jasa-usaha.index')
            ->with('success', 'Data sektor jasa usaha berhasil dihapus.');
    }

    // <-- PENTING: method show mengirim variabel bernama $sektorJasaUsaha agar sesuai dengan view
    public function show(SektorJasaUsaha $sektorJasaUsaha)
    {
        // load relasi supaya view aman
        $sektorJasaUsaha->load(['desa', 'mataPencaharian']);

        // jika ingin melakukan pengecekan desa_id seperti sebelumnya,
        // lakukan setelah debug/validasi session; di sini saya tidak memblokir akses
        return view('pages.perkembangan.struktur-mata-pencaharian.sektor-jasa-usaha.show', compact('sektorJasaUsaha'));
    }
}
