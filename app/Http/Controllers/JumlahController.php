<?php

namespace App\Http\Controllers;

use App\Models\Jumlah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class JumlahController extends Controller
{
    public function index()
    {
        $desaId = session('desa_id');
        $jumlahs = Jumlah::where('desa_id', $desaId)->latest()->paginate(10);
        return view('pages.potensi.potensi-sdm.jumlah.index', compact('jumlahs'));
    }

    public function create()
    {
        return view('pages.potensi.potensi-sdm.jumlah.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'jumlah_laki' => 'required|integer|min:0',
            'jumlah_perempuan' => 'required|integer|min:0',
            'jumlah_total' => 'required|integer|min:0',
            'jumlah_kk' => 'required|integer|min:0',
            'jumlah_penduduk' => 'required|integer|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Gagal menambahkan data jumlah.');
        }

        $data = $request->all();
        $data['desa_id'] = session('desa_id');

        Jumlah::create($data);

        return redirect()->route('potensi.potensi-sdm.jumlah.index')->with('success', 'Data jumlah berhasil ditambahkan.');
    }

    public function show(Jumlah $jumlah)
    {
        return view('pages.potensi.potensi-sdm.jumlah.show', compact('jumlah'));
    }

    public function edit(Jumlah $jumlah)
    {
        return view('pages.potensi.potensi-sdm.jumlah.edit', compact('jumlah'));
    }

    public function update(Request $request, Jumlah $jumlah)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'jumlah_laki' => 'required|integer|min:0',
            'jumlah_perempuan' => 'required|integer|min:0',
            'jumlah_total' => 'required|integer|min:0',
            'jumlah_kk' => 'required|integer|min:0',
            'jumlah_penduduk' => 'required|integer|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Gagal memperbarui data jumlah.');
        }

        $data = $request->all();
        $data['desa_id'] = session('desa_id'); // Ensure desa_id is updated if needed, or kept consistent

        $jumlah->update($data);

        return redirect()->route('potensi.potensi-sdm.jumlah.index')->with('success', 'Data jumlah berhasil diperbarui.');
    }

    public function destroy(Jumlah $jumlah)
    {
        $jumlah->delete();

        return redirect()->route('potensi.potensi-sdm.jumlah.index')->with('success', 'Data jumlah berhasil dihapus.');
    }
}
