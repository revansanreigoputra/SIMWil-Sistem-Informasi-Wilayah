<?php

namespace App\Http\Controllers;

use App\Models\SaranaTransportasiUmum;
use App\Models\Desa;
use Illuminate\Http\Request;

class SaranaTransportasiUmumController extends Controller
{
    /**
     * Tampilkan daftar data sarana transportasi umum.
     */
    public function index()
    {
        $data = SaranaTransportasiUmum::with('desa')
            ->orderBy('tanggal', 'desc')
            ->paginate(10);

        return view('pages.perkembangan.asetekonomi.sarana_transportasi_umum.index', compact('data'));
    }

    /**
     * Tampilkan form untuk menambah data baru.
     */
    public function create()
    {
        $desas = Desa::all();

        $jenis_aset_list = [
            'Memiliki cidemo/andong/dokar',
            'Memiliki bajaj/kancil',
            'Memiliki becak',
            'Memiliki bus penumpang/angkutan orang/barang',
            'Memiliki ojek motor/sepeda motor/bentor',
            'Memiliki perahu tidak bermotor',
            'Memiliki sepeda dayung',
            'Memiliki tongkang',
            'Memiliki Helikopter atau Pesawat',
        ];

        return view('pages.perkembangan.asetekonomi.sarana_transportasi_umum.create', compact('desas', 'jenis_aset_list'));
    }

    /**
     * Simpan data baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_desa' => 'required|exists:desas,id',
            'tanggal' => 'required|date',
            'jenis_aset' => 'required|string|max:255',
            'jumlah_pemilik' => 'nullable|integer|min:0',
            'jumlah_aset' => 'nullable|integer|min:0',
        ]);

        SaranaTransportasiUmum::create([
            'id_desa' => $request->id_desa,
            'tanggal' => $request->tanggal,
            'jenis_aset' => $request->jenis_aset,
            'jumlah_pemilik' => $request->jumlah_pemilik,
            'jumlah_aset' => $request->jumlah_aset,
        ]);

        return redirect()
            ->route('perkembangan.asetekonomi.sarana_transportasi_umum.index')
            ->with('success', 'Data Sarana Transportasi Umum berhasil ditambahkan.');
    }

    /**
     * Tampilkan detail data tertentu.
     */
    public function show($id)
    {
        $item = SaranaTransportasiUmum::with('desa')->findOrFail($id);
        return view('pages.perkembangan.asetekonomi.sarana_transportasi_umum.show', compact('item'));
    }

    /**
     * Tampilkan form edit data.
     */
    public function edit($id)
    {
        $item = SaranaTransportasiUmum::findOrFail($id);
        $desas = Desa::all();

        $jenis_aset_list = [
            'Memiliki cidemo/andong/dokar',
            'Memiliki bajaj/kancil',
            'Memiliki becak',
            'Memiliki bus penumpang/angkutan orang/barang',
            'Memiliki ojek motor/sepeda motor/bentor',
            'Memiliki perahu tidak bermotor',
            'Memiliki sepeda dayung',
            'Memiliki tongkang',
            'Memiliki Helikopter atau Pesawat',
        ];

        return view('pages.perkembangan.asetekonomi.sarana_transportasi_umum.edit', compact('item', 'desas', 'jenis_aset_list'));
    }

    /**
     * Update data yang sudah ada.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_desa' => 'required|exists:desas,id',
            'tanggal' => 'required|date',
            'jenis_aset' => 'required|string|max:255',
            'jumlah_pemilik' => 'nullable|integer|min:0',
            'jumlah_aset' => 'nullable|integer|min:0',
        ]);

        $item = SaranaTransportasiUmum::findOrFail($id);
        $item->update([
            'id_desa' => $request->id_desa,
            'tanggal' => $request->tanggal,
            'jenis_aset' => $request->jenis_aset,
            'jumlah_pemilik' => $request->jumlah_pemilik,
            'jumlah_aset' => $request->jumlah_aset,
        ]);

        return redirect()
            ->route('perkembangan.asetekonomi.sarana_transportasi_umum.index')
            ->with('success', 'Data Sarana Transportasi Umum berhasil diperbarui.');
    }

    /**
     * Hapus data dari database.
     */
    public function destroy($id)
    {
        $item = SaranaTransportasiUmum::findOrFail($id);
        $item->delete();

        return redirect()
            ->route('perkembangan.asetekonomi.sarana_transportasi_umum.index')
            ->with('success', 'Data Sarana Transportasi Umum berhasil dihapus.');
    }
}
