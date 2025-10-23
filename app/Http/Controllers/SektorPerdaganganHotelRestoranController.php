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
        $data = SektorPerdaganganHotelRestoran::where('desa_id', $desaId)
                    ->latest()
                    ->paginate(10);

        return view('pages.perkembangan.produk-domestik.sektor-perdagangan.index', compact('data'));
    }

    public function create()
    {
        return view('pages.perkembangan.produk-domestik.sektor-perdagangan.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            // perdagangan besar (Disesuaikan dengan Migration/Model)
            'jumlah_jenis_perdagangan_besar' => 'nullable|integer|min:0',
            'total_nilai_transaksi_besar' => 'nullable|integer|min:0',
            // Perbaikan nama field
            'total_nilai_aset_perdagangan_besar' => 'nullable|integer|min:0', 
            'total_biaya_yang_dikeluarkan_besar' => 'nullable|integer|min:0',
            'biaya_antara_lainnya_besar' => 'nullable|integer|min:0',
            
            // perdagangan kecil (Disesuaikan dengan Migration/Model)
            'jumlah_jenis_perdagangan_kecil' => 'nullable|integer|min:0',
            'total_nilai_transaksi_kecil' => 'nullable|integer|min:0',
            // Perbaikan nama field
            'total_biaya_yang_dikeluarkan_kecil' => 'nullable|integer|min:0', 
            // Perbaikan nama field
            'total_nilai_aset_perdagangan_kecil' => 'nullable|integer|min:0', 
            
            // hotel (Disesuaikan dengan Migration/Model)
            // Perbaikan nama field
            'jumlah_penginapan_dan_akomodasi' => 'nullable|integer|min:0', 
            'total_pendapatan_hotel' => 'nullable|integer|min:0',
            'total_biaya_pemeliharaan' => 'nullable|integer|min:0',
            // Perbaikan nama field
            'biaya_antara_hotel' => 'nullable|integer|min:0', 
            'pendapatan_diperoleh_hotel' => 'nullable|integer|min:0',
            
            // restoran (Disesuaikan dengan Migration/Model)
            'jumlah_tempat_konsumsi' => 'nullable|integer|min:0',
            // Perbaikan nama field
            'biaya_konsumsi_dikeluarkan' => 'nullable|integer|min:0', 
            // Perbaikan nama field
            'biaya_antara_restoran' => 'nullable|integer|min:0', 
            // Perbaikan nama field
            'pendapatan_diperoleh_restoran' => 'nullable|integer|min:0', 
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Gagal menambahkan data.');
        }

        $data = $request->all();
        $data['desa_id'] = session('desa_id');

        SektorPerdaganganHotelRestoran::create($data);

        return redirect()->route('perkembangan.produk-domestik.sektor-perdagangan.index')
            ->with('success', 'Data berhasil ditambahkan.');
    }

    public function show($id)
    {
        $data = SektorPerdaganganHotelRestoran::findOrFail($id);
        return view('pages.perkembangan.produk-domestik.sektor-perdagangan.show', compact('data'));
    }

    public function edit(SektorPerdaganganHotelRestoran $sektorPerdagangan)
    {
        return view('pages.perkembangan.produk-domestik.sektor-perdagangan.edit', compact('sektorPerdagangan'));
    }

    public function update(Request $request, SektorPerdaganganHotelRestoran $sektorPerdagangan)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            // Semua field di sini akan di-*update* secara massal, 
            // jadi selama nama input di *form* (edit.blade.php) sesuai dengan nama kolom, ini akan berhasil.
            // Namun, karena ada perubahan nama di form, kita tambahkan validasi *dummy* // untuk memastikan nama field sudah benar, meskipun tidak wajib divalidasi.
            'jumlah_jenis_perdagangan_besar' => 'nullable|integer|min:0',
            'total_nilai_transaksi_besar' => 'nullable|integer|min:0',
            'total_nilai_aset_perdagangan_besar' => 'nullable|integer|min:0', 
            'total_biaya_yang_dikeluarkan_besar' => 'nullable|integer|min:0',
            'biaya_antara_lainnya_besar' => 'nullable|integer|min:0',
            'jumlah_jenis_perdagangan_kecil' => 'nullable|integer|min:0',
            'total_nilai_transaksi_kecil' => 'nullable|integer|min:0',
            'total_biaya_yang_dikeluarkan_kecil' => 'nullable|integer|min:0', 
            'total_nilai_aset_perdagangan_kecil' => 'nullable|integer|min:0', 
            'jumlah_penginapan_dan_akomodasi' => 'nullable|integer|min:0', 
            'total_pendapatan_hotel' => 'nullable|integer|min:0',
            'total_biaya_pemeliharaan' => 'nullable|integer|min:0',
            'biaya_antara_hotel' => 'nullable|integer|min:0', 
            'pendapatan_diperoleh_hotel' => 'nullable|integer|min:0',
            'jumlah_tempat_konsumsi' => 'nullable|integer|min:0',
            'biaya_konsumsi_dikeluarkan' => 'nullable|integer|min:0', 
            'biaya_antara_restoran' => 'nullable|integer|min:0', 
            'pendapatan_diperoleh_restoran' => 'nullable|integer|min:0', 

        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Gagal memperbarui data.');
        }

        $data = $request->all();
        $data['desa_id'] = session('desa_id');

        $sektorPerdagangan->update($data);

        return redirect()->route('perkembangan.produk-domestik.sektor-perdagangan.index')
            ->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(SektorPerdaganganHotelRestoran $sektorPerdagangan)
    {
        $sektorPerdagangan->delete();

        return redirect()->route('perkembangan.produk-domestik.sektor-perdagangan.index')
            ->with('success', 'Data berhasil dihapus.');
    }
}