<?php

namespace App\Http\Controllers;

use App\Models\PenderitaSakit;
use App\Models\JenisPenyakit;
use App\Models\MasterPerkembangan\TempatPerawatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PenderitaSakitController extends Controller
{
    public function index()
    {
        $desaId = session('desa_id');
        $penderitaSakit = PenderitaSakit::with(['jenisPenyakit', 'tempatPerawatan'])
            ->where('desa_id', $desaId)
            ->latest()
            ->paginate(10);

        $jenisPenyakit = JenisPenyakit::all();
        $tempatPerawatan = TempatPerawatan::all();

        return view('pages.perkembangan.kesehatan-masyarakat.penderita-sakit.index', compact(
            'penderitaSakit',
            'jenisPenyakit',
            'tempatPerawatan'
        ));
    }

    public function create()
    {
        // Tidak perlu kirim $desas karena otomatis dari session
        $jenisPenyakit = JenisPenyakit::all();
        $tempatPerawatan = TempatPerawatan::all();
        return view('pages.perkembangan.kesehatan-masyarakat.penderita-sakit.create', compact(
            'jenisPenyakit',
            'tempatPerawatan'
        ));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'jenis_penyakit_id' => 'required|exists:jenis_penyakits,id',
            'jumlah_penderita' => 'required|integer|min:0',
            'tempat_perawatan_id' => 'required|exists:tempat_perawatan,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Gagal menambahkan data penderita sakit.');
        }

        $data = $request->all();
        $data['desa_id'] = session('desa_id');

        PenderitaSakit::create($data);

        return redirect()
            ->route('perkembangan.kesehatan-masyarakat.penderita-sakit.index')
            ->with('success', 'Data Penderita Sakit berhasil ditambahkan.');
    }

    public function show(PenderitaSakit $penderitaSakit)
    {
        return view('pages.perkembangan.kesehatan-masyarakat.penderita-sakit.show', compact('penderitaSakit'));
    }

    public function edit(PenderitaSakit $penderitaSakit)
    {
        $jenisPenyakit = JenisPenyakit::all();
        $tempatPerawatan = TempatPerawatan::all();
        return view('pages.perkembangan.kesehatan-masyarakat.penderita-sakit.edit', compact(
            'penderitaSakit',
            'jenisPenyakit',
            'tempatPerawatan'
        ));
    }

    public function update(Request $request, PenderitaSakit $penderitaSakit)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'jenis_penyakit_id' => 'required|exists:jenis_penyakits,id',
            'jumlah_penderita' => 'required|integer|min:0',
            'tempat_perawatan_id' => 'required|exists:tempat_perawatan,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Gagal memperbarui data penderita sakit.');
        }

        $data = $request->all();
        $data['desa_id'] = session('desa_id');

        $penderitaSakit->update($data);

        return redirect()
            ->route('perkembangan.kesehatan-masyarakat.penderita-sakit.index')
            ->with('success', 'Data Penderita Sakit berhasil diperbarui.');
    }

    public function destroy(PenderitaSakit $penderitaSakit)
    {
        $penderitaSakit->delete();

        return redirect()
            ->route('perkembangan.kesehatan-masyarakat.penderita-sakit.index')
            ->with('success', 'Data Penderita Sakit berhasil dihapus.');
    }
}
