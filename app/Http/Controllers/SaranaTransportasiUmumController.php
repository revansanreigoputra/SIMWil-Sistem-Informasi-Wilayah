<?php

namespace App\Http\Controllers;

use App\Models\SaranaTransportasiUmum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SaranaTransportasiUmumController extends Controller
{
    /**
     * Tampilkan daftar data sarana transportasi umum.
     */
    public function index()
    {
        $desaId = session('desa_id'); // ambil desa dari session
        $data = SaranaTransportasiUmum::where('id_desa', $desaId)
            ->orderBy('tanggal', 'desc')
            ->paginate(10);

        return view('pages.perkembangan.asetekonomi.sarana_transportasi_umum.index', compact('data'));
    }

    /**
     * Tampilkan form untuk menambah data baru.
     */
    public function create()
    {
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

        return view('pages.perkembangan.asetekonomi.sarana_transportasi_umum.create', compact('jenis_aset_list'));
    }

    /**
     * Simpan data baru ke database.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'jenis_aset' => 'required|string|max:255',
            'jumlah_pemilik' => 'nullable|integer|min:0',
            'jumlah_aset' => 'nullable|integer|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        SaranaTransportasiUmum::create([
            'id_desa' => session('desa_id'), // otomatis dari session
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
    public function show(SaranaTransportasiUmum $item)
    {
        return view('pages.perkembangan.asetekonomi.sarana_transportasi_umum.show', compact('item'));
    }

    /**
     * Tampilkan form edit data.
     */
    public function edit(SaranaTransportasiUmum $item)
    {
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

        return view('pages.perkembangan.asetekonomi.sarana_transportasi_umum.edit', compact('item', 'jenis_aset_list'));
    }

    /**
     * Update data yang sudah ada.
     */
    public function update(Request $request, SaranaTransportasiUmum $item)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'jenis_aset' => 'required|string|max:255',
            'jumlah_pemilik' => 'nullable|integer|min:0',
            'jumlah_aset' => 'nullable|integer|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $item->update([
            'id_desa' => session('desa_id'), // otomatis dari session
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
    public function destroy(SaranaTransportasiUmum $item)
    {
        $item->delete();

        return redirect()
            ->route('perkembangan.asetekonomi.sarana_transportasi_umum.index')
            ->with('success', 'Data Sarana Transportasi Umum berhasil dihapus.');
    }
}
