<?php

namespace App\Http\Controllers\PotensiKelembagaan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PotensiKelembagaan\LembagaKemasyarakatan;
use App\Models\MasterPotensi\JenisLembaga;
use App\Models\MasterPotensi\DasarHukum;
use Barryvdh\DomPDF\Facade\Pdf;

class LembagaKemasyarakatanController extends Controller
{
    public function index()
    {
        $data = LembagaKemasyarakatan::with(['jenisLembaga', 'dasarHukum'])->get();
        return view('pages.potensi.potensi-kelembagaan.lembaga-kemasyarakatan.index', compact('data'));
    }

    public function create()
    {
        $jenisLembaga = JenisLembaga::all();
        $dasarHukum = DasarHukum::all();
        return view('pages.potensi.potensi-kelembagaan.lembaga-kemasyarakatan.create', compact('jenisLembaga', 'dasarHukum'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'jenis_lembaga_id' => 'required|exists:jenis_lembaga,id',
            'dasar_hukum_id' => 'required|exists:dasar_hukum,id',
            'jumlah' => 'required|integer|min:0',
            'jumlah_pengurus' => 'required|integer|min:0',
            'alamat_kantor' => 'nullable|string',
            'jumlah_jenis_kegiatan' => 'nullable|integer|min:0',
            'ruang_lingkup_kegiatan' => 'nullable|string',
        ]);

        LembagaKemasyarakatan::create($request->all());

       return redirect()->route('potensi.potensi-kelembagaan.lembaga-kemasyarakatan.index');

    }
    public function show($id)
    {
        $data = LembagaKemasyarakatan::with(['jenisLembaga', 'dasarHukum'])->findOrFail($id);
        return view('pages.potensi.potensi-kelembagaan.lembaga-kemasyarakatan.show', compact('data'));
    }
    public function edit($id)
    {
        $data = LembagaKemasyarakatan::findOrFail($id);
        $jenisLembaga = JenisLembaga::all();
        $dasarHukum = DasarHukum::all();

        return view('pages.potensi.potensi-kelembagaan.lembaga-kemasyarakatan.edit', compact('data', 'jenisLembaga', 'dasarHukum'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'jenis_lembaga_id' => 'required|exists:jenis_lembaga,id',
            'dasar_hukum_id' => 'required|exists:dasar_hukum,id',
            'jumlah' => 'required|integer|min:0',
            'jumlah_pengurus' => 'required|integer|min:0',
            'alamat_kantor' => 'nullable|string',
            'jumlah_jenis_kegiatan' => 'nullable|integer|min:0',
            'ruang_lingkup_kegiatan' => 'nullable|string',
        ]);

        $data = LembagaKemasyarakatan::findOrFail($id);
        $data->update($request->validated());

        return redirect()->route('potensi.potensi-kelembagaan.lembaga-kemasyarakatan.index')
            ->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $data = LembagaKemasyarakatan::findOrFail($id);
        $data->delete();

        return redirect()->route('potensi.potensi-kelembagaan.lembaga-kemasyarakatan.index')
            ->with('success', 'Data berhasil dihapus.');
    }
     public function print($id)
    {
        $data = LembagaKemasyarakatan::with(['jenisLembaga', 'dasarHukum'])->findOrFail($id);
        $pdf = Pdf::loadView('pages.potensi.potensi-kelembagaan.lembaga-kemasyarakatan.print', compact('data'))
                  ->setPaper('a4', 'portrait');
        return $pdf->stream('Data_Lembaga_Kemasyarakatan_' . $data->id . '.pdf');
    }

    public function download($id)
    {
        $data = LembagaKemasyarakatan::with(['jenisLembaga', 'dasarHukum'])->findOrFail($id);
        $pdf = Pdf::loadView('pages.potensi.potensi-kelembagaan.lembaga-kemasyarakatan.print', compact('data'))
                  ->setPaper('a4', 'portrait');
        return $pdf->download('Data_Lembaga_Kemasyarakatan_' . $data->id . '.pdf');
    }
}
