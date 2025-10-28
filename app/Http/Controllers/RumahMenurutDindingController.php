<?php

namespace App\Http\Controllers;

use App\Models\RumahMenurutDinding;
use App\Models\JenisDinding;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RumahMenurutDindingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $desaId = session('desa_id');

        $items = RumahMenurutDinding::with(['desa', 'jenisDinding'])
            ->where('id_desa', $desaId)
            ->orderBy('tanggal', 'desc')
            ->paginate(10);

        return view('pages.perkembangan.asetekonomi.rumah_menurut_dinding.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jenisDindings = JenisDinding::all();
        return view('pages.perkembangan.asetekonomi.rumah_menurut_dinding.create', compact('jenisDindings'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'id_aset_dinding' => 'required|exists:jenis_dindings,id',
            'jumlah' => 'required|integer|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->all();
        $data['id_desa'] = session('desa_id');
        $data['id_kec'] = 1; // kalau memang selalu default ke 1
        RumahMenurutDinding::create($data);

        return redirect()->route('perkembangan.asetekonomi.rumah_menurut_dinding.index')
            ->with('success', 'Data Rumah Menurut Dinding berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(RumahMenurutDinding $rumahMenurutDinding)
    {
        return view('pages.perkembangan.asetekonomi.rumah_menurut_dinding.show', compact('rumahMenurutDinding'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RumahMenurutDinding $rumahMenurutDinding)
    {
        $jenisDindings = JenisDinding::all();
        return view('pages.perkembangan.asetekonomi.rumah_menurut_dinding.edit', compact('rumahMenurutDinding', 'jenisDindings'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RumahMenurutDinding $rumahMenurutDinding)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'id_aset_dinding' => 'required|exists:jenis_dindings,id',
            'jumlah' => 'required|integer|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->all();
        $data['id_desa'] = session('desa_id');
        $data['id_kec'] = 1;

        $rumahMenurutDinding->update($data);

        return redirect()->route('perkembangan.asetekonomi.rumah_menurut_dinding.index')
            ->with('success', 'Data Rumah Menurut Dinding berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RumahMenurutDinding $rumahMenurutDinding)
    {
        $rumahMenurutDinding->delete();

        return redirect()->route('perkembangan.asetekonomi.rumah_menurut_dinding.index')
            ->with('success', 'Data Rumah Menurut Dinding berhasil dihapus.');
    }
}
