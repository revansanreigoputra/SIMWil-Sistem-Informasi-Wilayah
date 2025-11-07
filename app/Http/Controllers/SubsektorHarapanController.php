<?php

namespace App\Http\Controllers;

use App\Models\SubsektorHarapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubsektorHarapanController extends Controller
{
    /**
     * Tampilkan daftar data berdasarkan desa login (dari session)
     */
    public function index()
    {
        $desaId = session('desa_id'); // Ambil ID desa dari session login

        $data = SubsektorHarapan::with('desa')
            ->where('desa_id', $desaId)
            ->latest()
            ->paginate(10);

        return view('pages.perkembangan.kesehatan-masyarakat.subsektor-harapan.index', compact('data'));
    }

    /**
     * Form tambah data — tidak perlu dropdown desa
     */
    public function create()
    {
        return view('pages.perkembangan.kesehatan-masyarakat.subsektor-harapan.create');
    }

    /**
     * Simpan data baru — desa_id otomatis dari session
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'angka_harapan_hidup_desa' => 'required|integer|min:0',
            'angka_harapan_hidup_kabupaten' => 'required|integer|min:0',
            'angka_harapan_hidup_provinsi' => 'required|integer|min:0',
            'angka_harapan_hidup_nasional' => 'required|integer|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Gagal menambahkan data subsektor harapan.');
        }

        $data = $request->all();
        $data['desa_id'] = session('desa_id'); // otomatis ambil dari session

        SubsektorHarapan::create($data);

        return redirect()
            ->route('perkembangan.kesehatan-masyarakat.subsektor-harapan.index')
            ->with('success', 'Data subsektor harapan berhasil ditambahkan.');
    }

    /**
     * Edit data — tanpa dropdown desa
     */
    public function edit(SubsektorHarapan $subsektorHarapan)
    {
        return view('pages.perkembangan.kesehatan-masyarakat.subsektor-harapan.edit', [
            'data' => $subsektorHarapan
        ]);
    }

    /**
     * Update data — desa_id tetap otomatis dari session
     */
    public function update(Request $request, SubsektorHarapan $subsektorHarapan)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'angka_harapan_hidup_desa' => 'required|integer|min:0',
            'angka_harapan_hidup_kabupaten' => 'required|integer|min:0',
            'angka_harapan_hidup_provinsi' => 'required|integer|min:0',
            'angka_harapan_hidup_nasional' => 'required|integer|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Gagal memperbarui data subsektor harapan.');
        }

        $data = $request->all();
        $data['desa_id'] = session('desa_id'); // isi ulang otomatis

        $subsektorHarapan->update($data);

        return redirect()
            ->route('perkembangan.kesehatan-masyarakat.subsektor-harapan.index')
            ->with('success', 'Data subsektor harapan berhasil diperbarui.');
    }

    /**
     * Hapus data
     */
    public function destroy(SubsektorHarapan $subsektorHarapan)
    {
        $subsektorHarapan->delete();

        return redirect()
            ->route('perkembangan.kesehatan-masyarakat.subsektor-harapan.index')
            ->with('success', 'Data subsektor harapan berhasil dihapus.');
    }

    /**
     * Detail data
     */
  public function show($id)
    {
        $data = SubsektorHarapan::findOrFail($id);

        return view('pages.perkembangan.kesehatan-masyarakat.subsektor-harapan.show', compact('data'));
    }
}
