<?php

namespace App\Http\Controllers;

use App\Models\MasterDDK\MataPencaharian;
use App\Models\SektorIndustriKecil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SektorIndustriKecilController extends Controller
{
    public function index()
{
    $desaId = session('desa_id');

    $data = SektorIndustriKecil::with(['desa', 'mataPencaharian'])
            ->where('desa_id', $desaId)
            ->latest()
            ->paginate(10);

    // Tambahkan baris ini
    $mataPencaharians = MataPencaharian::all();

    return view('pages.perkembangan.struktur-mata-pencaharian.sektor-industri-kecil.index', compact('data', 'mataPencaharians'));
}

   public function create()
{
    $mataPencaharians = MataPencaharian::orderBy('mata_pencaharian')->get();

    return view('pages.perkembangan.struktur-mata-pencaharian.sektor-industri-kecil.create', compact('mataPencaharians'));
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
                ->with('error', 'Gagal menambahkan data sektor industri kecil.');
        }

        $data = $request->all();
        $data['desa_id'] = session('desa_id');

        SektorIndustriKecil::create($data);

        return redirect()
            ->route('perkembangan.struktur-mata-pencaharian.sektor-industri-kecil.index')
            ->with('success', 'Data sektor industri kecil berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data = SektorIndustriKecil::findOrFail($id);
        $mataPencaharians = MataPencaharian::all();

        return view('pages.perkembangan.struktur-mata-pencaharian.sektor-industri-kecil.edit', compact('data', 'mataPencaharians'));
    }

    public function update(Request $request, SektorIndustriKecil $sektorIndustriKecil)
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
                ->with('error', 'Gagal memperbarui data sektor industri kecil.');
        }

        $data = $request->all();
        $data['desa_id'] = session('desa_id');

        $sektorIndustriKecil->update($data);

        return redirect()
            ->route('perkembangan.struktur-mata-pencaharian.sektor-industri-kecil.index')
            ->with('success', 'Data sektor industri kecil berhasil diperbarui.');
    }

    public function destroy(SektorIndustriKecil $sektorIndustriKecil)
    {
        $sektorIndustriKecil->delete();

        return redirect()
            ->route('perkembangan.struktur-mata-pencaharian.sektor-industri-kecil.index')
            ->with('success', 'Data sektor industri kecil berhasil dihapus.');
    }
    public function show($id)
{
    // Ambil data sektor industri kecil beserta relasinya
    $data = SektorIndustriKecil::with(['desa', 'mataPencaharian'])->findOrFail($id);

    // Kirim ke view detail
    return view('pages.perkembangan.struktur-mata-pencaharian.sektor-industri-kecil.show', compact('data'));
}

}
