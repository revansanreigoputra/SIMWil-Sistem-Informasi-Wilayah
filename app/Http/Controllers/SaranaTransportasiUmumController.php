<?php

namespace App\Http\Controllers;

use App\Models\SaranaTransportasiUmum;
use App\Models\MasterPerkembangan\AsetSarana;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SaranaTransportasiUmumController extends Controller
{
    public function index()
    {
        $desaId = session('desa_id');

        $data = SaranaTransportasiUmum::where('id_desa', $desaId)
            ->orderBy('tanggal', 'desc')
            ->paginate(10);

        return view('pages.perkembangan.asetekonomi.sarana_transportasi_umum.index', compact('data'));
    }

    public function create()
    {
        $jenis_aset_list = AsetSarana::all();

        return view(
            'pages.perkembangan.asetekonomi.sarana_transportasi_umum.create',
            compact('jenis_aset_list')
        );
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'jenis_aset' => 'required|exists:aset_sarana,id',
            'jumlah_pemilik' => 'nullable|integer|min:0',
            'jumlah_aset' => 'nullable|integer|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        SaranaTransportasiUmum::create([
            'id_desa' => session('desa_id'),
            'tanggal' => $request->tanggal,
            'jenis_aset' => $request->jenis_aset,
            'jumlah_pemilik' => $request->jumlah_pemilik,
            'jumlah_aset' => $request->jumlah_aset,
        ]);

        return redirect()
            ->route('perkembangan.asetekonomi.sarana_transportasi_umum.index')
            ->with('success', 'Data Sarana Transportasi Umum berhasil ditambahkan.');
    }

    public function show(SaranaTransportasiUmum $item)
    {
        return view('pages.perkembangan.asetekonomi.sarana_transportasi_umum.show', compact('item'));
    }

    public function edit(SaranaTransportasiUmum $item)
    {
        $jenis_aset_list = AsetSarana::all();

        return view(
            'pages.perkembangan.asetekonomi.sarana_transportasi_umum.edit',
            compact('item', 'jenis_aset_list')
        );
    }

    public function update(Request $request, SaranaTransportasiUmum $item)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'jenis_aset' => 'required|exists:aset_sarana,id',
            'jumlah_pemilik' => 'nullable|integer|min:0',
            'jumlah_aset' => 'nullable|integer|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $item->update([
            'tanggal' => $request->tanggal,
            'jenis_aset' => $request->jenis_aset,
            'jumlah_pemilik' => $request->jumlah_pemilik,
            'jumlah_aset' => $request->jumlah_aset,
        ]);

        return redirect()
            ->route('perkembangan.asetekonomi.sarana_transportasi_umum.index')
            ->with('success', 'Data Sarana Transportasi Umum berhasil diperbarui.');
    }

    public function destroy(SaranaTransportasiUmum $item)
    {
        $item->delete();

        return redirect()
            ->route('perkembangan.asetekonomi.sarana_transportasi_umum.index')
            ->with('success', 'Data Sarana Transportasi Umum berhasil dihapus.');
    }
}
