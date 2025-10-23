<?php

namespace App\Http\Controllers;

use App\Models\RumahMenurutLantai;
use App\Models\JenisLantai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RumahMenurutLantaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $desaId = session('desa_id');

        $items = RumahMenurutLantai::with(['desa', 'jenisLantai'])
            ->where('desa_id', $desaId)
            ->orderBy('tanggal', 'desc')
            ->paginate(10);

        return view('pages.perkembangan.asetekonomi.rumah_menurut_lantai.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jenisLantais = JenisLantai::all();
        return view('pages.perkembangan.asetekonomi.rumah_menurut_lantai.create', compact('jenisLantais'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'jenis_lantai_id' => 'required|exists:jenis_lantais,id',
            'tanggal' => 'required|date',
            'jumlah' => 'required|integer|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->only(['jenis_lantai_id', 'tanggal', 'jumlah']);
        $data['desa_id'] = session('desa_id');

        RumahMenurutLantai::create($data);

        return redirect()->route('perkembangan.asetekonomi.rumah_menurut_lantai.index')
            ->with('success', 'Data Rumah Menurut Lantai berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $desaId = session('desa_id');
        $item = RumahMenurutLantai::with(['desa', 'jenisLantai'])
            ->where('desa_id', $desaId)
            ->findOrFail($id);

        return view('pages.perkembangan.asetekonomi.rumah_menurut_lantai.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $desaId = session('desa_id');
        $item = RumahMenurutLantai::where('desa_id', $desaId)->findOrFail($id);
        $jenisLantais = JenisLantai::all();

        return view('pages.perkembangan.asetekonomi.rumah_menurut_lantai.edit', compact('item', 'jenisLantais'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'jenis_lantai_id' => 'required|exists:jenis_lantais,id',
            'tanggal' => 'required|date',
            'jumlah' => 'required|integer|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $desaId = session('desa_id');
        $item = RumahMenurutLantai::where('desa_id', $desaId)->findOrFail($id);

        $data = $request->only(['jenis_lantai_id', 'tanggal', 'jumlah']);
        $data['desa_id'] = $desaId;

        $item->update($data);

        return redirect()->route('perkembangan.asetekonomi.rumah_menurut_lantai.index')
            ->with('success', 'Data Rumah Menurut Lantai berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $desaId = session('desa_id');
        $item = RumahMenurutLantai::where('desa_id', $desaId)->findOrFail($id);
        $item->delete();

        return redirect()->route('perkembangan.asetekonomi.rumah_menurut_lantai.index')
            ->with('success', 'Data Rumah Menurut Lantai berhasil dihapus.');
    }
}
