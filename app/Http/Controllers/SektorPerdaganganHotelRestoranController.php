<?php

namespace App\Http\Controllers;

use App\Models\SektorPerdaganganHotelRestoran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SektorPerdaganganHotelRestoranController extends Controller
{
    public function index()
    {
        $desaId = session('desa_id');
        $data = SektorPerdaganganHotelRestoran::with('desa')
            ->where('desa_id', $desaId)
            ->latest()
            ->paginate(10);

        return view('pages.perkembangan.produk-domestik.sektor-perdagangan-hotel-restoran.index', compact('data'));
    }

    public function create()
    {
        return view('pages.perkembangan.produk-domestik.sektor-perdagangan-hotel-restoran.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput()->with('error', 'Gagal menambahkan data.');
        }

        $data = $request->all();
        $data['desa_id'] = session('desa_id');

        SektorPerdaganganHotelRestoran::create($data);

        return redirect()->route('perkembangan.produk-domestik.sektor-perdagangan-hotel-restoran.index')
            ->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit($id)
{
    $perdagangan = SektorPerdaganganHotelRestoran::findOrFail($id);
    return view('pages.perkembangan.produk-domestik.sektor-perdagangan-hotel-restoran.edit', compact('perdagangan'));
}

public function show($id)
{
    $data = SektorPerdaganganHotelRestoran::with('desa')->findOrFail($id);
    return view('pages.perkembangan.produk-domestik.sektor-perdagangan-hotel-restoran.show', compact('data'));
}


    public function update(Request $request, $id)
    {
        $data = SektorPerdaganganHotelRestoran::findOrFail($id);
        $data->update($request->all());
        return redirect()->route('perkembangan.produk-domestik.sektor-perdagangan-hotel-restoran.index')
            ->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        SektorPerdaganganHotelRestoran::findOrFail($id)->delete();
        return back()->with('success', 'Data berhasil dihapus.');
    }
}
