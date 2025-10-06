<?php

namespace App\Http\Controllers;

use App\Models\Tap;
use Illuminate\Http\Request;

class TapController extends Controller
{
    public function index()
    {
        $taps = Tap::latest()->get();

        // TAMBAHKAN BARIS INI untuk mengambil data master dummy
        $master_data = $this->getMasterData();

        // KIRIM SEMUA DATA (taps dan master_data) KE VIEW
        return view('pages.utama.tap.index', array_merge(compact('taps'), $master_data));
    }

    public function create()
    {
        // --- DATA DUMMY SEMENTARA UNTUK DROPDOWN ---
        $master_data = $this->getMasterData();

        return view('pages.utama.tap.create', $master_data);
    }

    /**
     * Menyimpan data baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jns_kelamin' => 'required|in:Laki-Laki,Perempuan',
            'kontak' => 'required|string|max:20',
            'email' => 'required|email|unique:taps,email',
            'tgl_tap' => 'required|date',
            'tahun' => 'required|digits:4|integer',
            'id_wk' => 'required|integer',
            'id_ktk' => 'required|integer',
            'id_prov' => 'required|integer',
            'id_kabkot1' => 'required|integer',
            'id_kabkot2' => 'nullable|integer',
        ]);

        Tap::create($request->all());

        return redirect()->route('utama.tap.index')
            ->with('message', 'Data TA Pendamping berhasil ditambahkan!');
    }

    /**
     * Menyiapkan dan menampilkan form edit data.
     */
    public function edit(string $id)
    {
        $tap = Tap::findOrFail($id);
        $master_data = $this->getMasterData();

        return view('pages.utama.tap.edit', array_merge(compact('tap'), $master_data));
    }

    /**
     * Mengupdate data yang ada di database.
     */
    public function update(Request $request, string $id)
    {
        $tap = Tap::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'jns_kelamin' => 'required|in:Laki-Laki,Perempuan',
            'kontak' => 'required|string|max:20',
            'email' => 'required|email|unique:taps,email,' . $tap->id, // Abaikan email saat ini
            'tgl_tap' => 'required|date',
            'tahun' => 'required|digits:4|integer',
            'id_wk' => 'required|integer',
            'id_ktk' => 'required|integer',
            'id_prov' => 'required|integer',
            'id_kabkot1' => 'required|integer',
            'id_kabkot2' => 'nullable|integer',
        ]);

        $tap->update($request->all());

        return redirect()->route('utama.tap.index')
            ->with('message', 'Data TA Pendamping berhasil diperbarui!');
    }

    /**
     * Menghapus data dari database.
     */
    public function destroy(string $id)
    {
        $tap = Tap::findOrFail($id);
        $tap->delete();

        return redirect()->route('utama.tap.index')
            ->with('message', 'Data TA Pendamping berhasil dihapus!');
    }

    public function show(string $id)
    {
        $tap = Tap::findOrFail($id);
        $master_data = $this->getMasterData(); // Kirim data dummy untuk lookup nama

        return view('pages.utama.tap.show', array_merge(compact('tap'), $master_data));
    }

    private function getMasterData()
    {
        return [
            'wilayah_kerjas' => [
                ['id' => 1, 'nama' => 'Wilayah Barat'],
                ['id' => 2, 'nama' => 'Wilayah Timur'],
                ['id' => 3, 'nama' => 'Wilayah Tengah'],
            ],
            'kategori_keahlians' => [
                ['id' => 1, 'nama' => 'Pemberdayaan Masyarakat'],
                ['id' => 2, 'nama' => 'Teknik Sipil'],
                ['id' => 3, 'nama' => 'Keuangan Desa'],
            ],
            'provinsis' => [
                ['id' => 11, 'nama' => 'ACEH'],
                ['id' => 12, 'nama' => 'SUMATERA UTARA'],
                ['id' => 34, 'nama' => 'DI YOGYAKARTA'],
            ],
            'kabupatens' => [
                ['id' => 1101, 'nama' => 'KAB. ACEH SELATAN'],
                ['id' => 1201, 'nama' => 'KAB. TAPANULI TENGAH'],
                ['id' => 3404, 'nama' => 'KAB. SLEMAN'],
            ],
        ];
    }
}
