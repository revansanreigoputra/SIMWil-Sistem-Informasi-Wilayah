<?php

namespace App\Http\Controllers;

use App\Models\RumahMenurutAtap;
use App\Models\JenisAtap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RumahMenurutAtapController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $desaId = session('desa_id');

        $items = RumahMenurutAtap::with(['desa', 'jenisAtap'])
            ->where('id_desa', $desaId)
            ->orderBy('tanggal', 'desc')
            ->paginate(10);

        return view('pages.perkembangan.asetekonomi.rumah_menurut_atap.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jenisAtaps = JenisAtap::all();
        return view('pages.perkembangan.asetekonomi.rumah_menurut_atap.create', compact('jenisAtaps'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'id_aset_atap' => 'required|exists:jenis_ataps,id',
            'jumlah' => 'required|integer|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->all();
        $data['id_desa'] = session('desa_id');

        RumahMenurutAtap::create($data);

        return redirect()->route('perkembangan.asetekonomi.rumah_menurut_atap.index')
            ->with('success', 'Data Rumah Menurut Atap berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $item = RumahMenurutAtap::with(['desa', 'jenisAtap'])->findOrFail($id);
        return view('pages.perkembangan.asetekonomi.rumah_menurut_atap.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $item = RumahMenurutAtap::findOrFail($id);
        $jenisAtaps = JenisAtap::all();

        return view('pages.perkembangan.asetekonomi.rumah_menurut_atap.edit', compact('item', 'jenisAtaps'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'id_aset_atap' => 'required|exists:jenis_ataps,id',
            'jumlah' => 'required|integer|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $item = RumahMenurutAtap::findOrFail($id);
        $data = $request->all();
        $data['id_desa'] = session('desa_id');

        $item->update($data);

        return redirect()->route('perkembangan.asetekonomi.rumah_menurut_atap.index')
            ->with('success', 'Data Rumah Menurut Atap berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $item = RumahMenurutAtap::findOrFail($id);
        $item->delete();

        return redirect()->route('perkembangan.asetekonomi.rumah_menurut_atap.index')
            ->with('success', 'Data Rumah Menurut Atap berhasil dihapus.');
    }
}
