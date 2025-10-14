<?php

namespace App\Http\Controllers\PotensiKelembagaan;

use App\Http\Controllers\Controller;
use App\Models\JasaPengangkutan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class JasaPengangkutanController extends Controller
{
     public function index()
    {
        $data = JasaPengangkutan::latest()->get();
        return view('pages.potensi.kelembagaan.pengangkutan.index', compact('data'));
    }

    public function create()
    {
        // Dropdown options
        $kategoriOptions = ['Angkutan Darat', 'Angkutan Laut'];
        $jenisAngkutanOptions = [
            'Bus Umum',
            'Angkot',
            'Kapal Ferry', 
            'Kapal Tongkang',
        ];

        return view('pages.potensi.kelembagaan.pengangkutan.create', compact('kategoriOptions', 'jenisAngkutanOptions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'kategori' => 'required|in:Angkutan Darat,Angkutan Laut',
            'jenis_angkutan' => 'required|in:Bus Umum,Angkot,Kapal Ferry,Kapal Tongkang',
            'jumlah_unit' => 'required|integer|min:0',
            'jumlah_pemilik' => 'required|integer|min:0',
            'kapasitas' => 'required|integer|min:0',
            'tenaga_kerja' => 'required|integer|min:0',
        ]);

        JasaPengangkutan::create($request->all());

       return redirect()->route('potensi.kelembagaan.pengangkutan.index')
                 ->with('success', 'Data berhasil disimpan!');

    }
        public function edit($id)
    {
        $data = JasaPengangkutan::findOrFail($id);

        // ini penting biar form edit punya pilihan dropdown juga
        $kategoriOptions = ['Angkutan Darat', 'Angkutan Laut'];
        $jenisAngkutanOptions = [
            'Bus Umum',
            'Angkot',
            'Kapal Ferry',
            'Kapal Tongkang',
        ];

        return view('pages.potensi.kelembagaan.pengangkutan.edit', compact('data', 'kategoriOptions', 'jenisAngkutanOptions'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'kategori' => 'required|in:Angkutan Darat,Angkutan Laut',
            'jenis_angkutan' => 'required|in:Bus Umum,Angkot,Kapal Ferry,Kapal Tongkang',
            'jumlah_unit' => 'required|integer|min:0',
            'jumlah_pemilik' => 'required|integer|min:0',
            'kapasitas' => 'required|integer|min:0',
            'tenaga_kerja' => 'required|integer|min:0',
        ]);

        $data = JasaPengangkutan::findOrFail($id);
        $data->update($request->all());

        return redirect()->route('potensi.kelembagaan.pengangkutan.index')
            ->with('success', 'Data berhasil diperbarui!');
    }
    public function destroy($id)
    {
        $data = JasaPengangkutan::findOrFail($id);
        $data->delete();

        return redirect()->route('potensi.kelembagaan.pengangkutan.index')
                     ->with('success', 'Data berhasil dihapus!');
    }
    public function show($id)
    {
        
        $data = JasaPengangkutan::findOrFail($id);

        // ini penting biar form edit punya pilihan dropdown juga
        $kategoriOptions = ['Angkutan Darat', 'Angkutan Laut'];
        $jenisAngkutanOptions = [
            'Bus Umum',
            'Angkot',
            'Kapal Ferry',
            'Kapal Tongkang',
        ];
        return view('pages.potensi.kelembagaan.pengangkutan.show', compact('data', 'kategoriOptions', 'jenisAngkutanOptions'));
    }
    public function print($id)
    {
        $data = JasaPengangkutan::findOrFail($id);

        $pdf = Pdf::loadView('pages.potensi.kelembagaan.pengangkutan.print', compact('data'))
              ->setPaper('a4', 'portrait');

        // Pilih salah satu:
        return $pdf->download('Detail_Jasa_Pengangkutan_'.$data->id.'.pdf'); // auto-download
        // return $pdf->stream('Detail_Jasa_Pengangkutan_'.$data->id.'.pdf'); // preview di browser
    }
}
