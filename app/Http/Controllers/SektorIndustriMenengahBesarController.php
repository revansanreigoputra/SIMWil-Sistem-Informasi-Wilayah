<?php

namespace App\Http\Controllers;

use App\Models\SektorIndustriMenengahBesar;
use App\Models\MasterDDK\MataPencaharian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SektorIndustriMenengahBesarController extends Controller
{
    public function index()
    {
        $desaId = session('desa_id');
        $data = SektorIndustriMenengahBesar::with(['desa', 'mataPencaharian'])
                    ->where('desa_id', $desaId)
                    ->latest()
                    ->paginate(10);

        $mataPencaharians = MataPencaharian::all();

        return view('pages.perkembangan.struktur-mata-pencaharian.sektor-industri-menengah-besar.index', compact('data', 'mataPencaharians'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
           'mata_pencaharian_id' => 'required|exists:mata_pencaharians,id',
            'jumlah' => 'nullable|integer|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $request->all();
        $data['desa_id'] = session('desa_id');

        SektorIndustriMenengahBesar::create($data);

        return redirect()->route('perkembangan.struktur-mata-pencaharian.sektor-industri-menengah-besar.index')
                         ->with('success', 'Data berhasil ditambahkan.');
    }

    public function show($id)
    {
        $data = SektorIndustriMenengahBesar::with(['desa', 'mataPencaharian'])->findOrFail($id);
        return view('pages.perkembangan.struktur-mata-pencaharian.sektor-industri-menengah-besar.show', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'mata_pencaharian_id' => 'required|exists:mata_pencaharians,id',
            'jumlah' => 'nullable|integer|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = SektorIndustriMenengahBesar::findOrFail($id);
        $data->update($request->all());

        return redirect()->route('perkembangan.struktur-mata-pencaharian.sektor-industri-menengah-besar.index')
                         ->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $data = SektorIndustriMenengahBesar::findOrFail($id);
        $data->delete();

        return redirect()->route('perkembangan.struktur-mata-pencaharian.sektor-industri-menengah-besar.index')
                         ->with('success', 'Data berhasil dihapus.');
    }
}
