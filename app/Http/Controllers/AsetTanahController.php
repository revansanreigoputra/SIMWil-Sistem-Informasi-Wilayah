<?php

namespace App\Http\Controllers;

use App\Models\AsetTanah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AsetTanahController extends Controller
{
    // ✅ Index
    public function index()
    {
        $desaId = session('desa_id'); // ambil desa dari session
        $asetTanahs = AsetTanah::with('desa')
            ->where('id_desa', $desaId)
            ->orderBy('tanggal', 'desc')
            ->paginate(10); // pagination 10 per halaman

        return view('pages.perkembangan.asetekonomi.aset_tanah.index', compact('asetTanahs'));
    }

    // ✅ Form Tambah
    public function create()
    {
        return view('pages.perkembangan.asetekonomi.aset_tanah.create');
    }

    // ✅ Simpan Data
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'tidak_memiliki' => 'nullable|integer',
            'tanah1' => 'nullable|integer',
            'tanah2' => 'nullable|integer',
            'tanah3' => 'nullable|integer',
            'tanah4' => 'nullable|integer',
            'tanah5' => 'nullable|integer',
            'tanah6' => 'nullable|integer',
            'tanah7' => 'nullable|integer',
            'tanah8' => 'nullable|integer',
            'tanah9' => 'nullable|integer',
            'tanah10' => 'nullable|integer',
            'tanah11' => 'nullable|integer',
            'memiliki_lebih' => 'nullable|integer',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $validator->validated();
        $data['id_desa'] = session('desa_id');

        // Hitung jumlah total otomatis
        $numericFields = ['tidak_memiliki','tanah1','tanah2','tanah3','tanah4','tanah5','tanah6','tanah7','tanah8','tanah9','tanah10','tanah11','memiliki_lebih'];
        $total = 0;
        foreach ($numericFields as $field) {
            $total += isset($data[$field]) ? (int)$data[$field] : 0;
        }
        $data['jumlah'] = $total;

        AsetTanah::create($data);

        return redirect()->route('perkembangan.asetekonomi.aset_tanah.index')
            ->with('success', 'Data Penguasaan Aset Tanah berhasil ditambahkan.');
    }

    // ✅ Detail
    public function show(AsetTanah $asetTanah)
    {
        return view('pages.perkembangan.asetekonomi.aset_tanah.show', compact('asetTanah'));
    }

    // ✅ Form Edit
    public function edit(AsetTanah $asetTanah)
    {
        return view('pages.perkembangan.asetekonomi.aset_tanah.edit', compact('asetTanah'));
    }

    // ✅ Update Data
    public function update(Request $request, AsetTanah $asetTanah)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'tidak_memiliki' => 'nullable|integer',
            'tanah1' => 'nullable|integer',
            'tanah2' => 'nullable|integer',
            'tanah3' => 'nullable|integer',
            'tanah4' => 'nullable|integer',
            'tanah5' => 'nullable|integer',
            'tanah6' => 'nullable|integer',
            'tanah7' => 'nullable|integer',
            'tanah8' => 'nullable|integer',
            'tanah9' => 'nullable|integer',
            'tanah10' => 'nullable|integer',
            'tanah11' => 'nullable|integer',
            'memiliki_lebih' => 'nullable|integer',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $validator->validated();
        $data['id_desa'] = session('desa_id');

        // Hitung jumlah total otomatis
        $numericFields = ['tidak_memiliki','tanah1','tanah2','tanah3','tanah4','tanah5','tanah6','tanah7','tanah8','tanah9','tanah10','tanah11','memiliki_lebih'];
        $total = 0;
        foreach ($numericFields as $field) {
            $total += isset($data[$field]) ? (int)$data[$field] : 0;
        }
        $data['jumlah'] = $total;

        $asetTanah->update($data);

        return redirect()->route('perkembangan.asetekonomi.aset_tanah.index')
            ->with('success', 'Data Penguasaan Aset Tanah berhasil diperbarui.');
    }

    // ✅ Hapus Data
    public function destroy(AsetTanah $asetTanah)
    {
        $asetTanah->delete();

        return redirect()->route('perkembangan.asetekonomi.aset_tanah.index')
            ->with('success', 'Data Penguasaan Aset Tanah berhasil dihapus.');
    }
}
