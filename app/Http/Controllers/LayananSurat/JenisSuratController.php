<?php

namespace App\Http\Controllers\LayananSurat;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LayananSurat\JenisSurat;

class JenisSuratController extends Controller
{
    public function index()
    {
        $jenisSurats = JenisSurat::all();
        return view('pages.layanan.template.jenis_surats.index', compact('jenisSurats'));
    }
    public function create()
    {
        return view('pages.layanan.template.jenis_surats.create');
    }
    public function store(Request $request)
    {
        // 1. Validasi Input
        $request->validate([ 
            'kode' => 'required|string|max:255|unique:jenis_surats,kode',
            'nama' => 'required|string|max:255|unique:jenis_surats,nama',   
              
        ], [
            'kode.required' => 'Kode Jenis Surat wajib diisi.',
            'nama.required' => 'Nama Jenis Surat wajib diisi.',
             
        ]);

        $data = $request->only([
            'kode', 'nama', 'konten_template'
        ]);
        
        
        $data['variabel_input'] = $request->input('variabel_input');
        
        
        JenisSurat::create($data);

        
        return redirect()->route('jenis_surats.index')->with('success', 'Jenis Surat dan Template berhasil dibuat.');
    }

    public function edit($id)
    {
        // $formatNomorSurat = JenisSurat::findOrFail($id);
        // return view('pages.layanan.template.jenis_surats.edit', compact('formatNomorSurat'));
    }
    public function update(Request $request, $id)
    {
        // $formatNomorSurat = JenisSurat::findOrFail($id);
        // $request->validate([
        //     'kode' => 'required|string|max:255|unique:format_nomor_surats,kode,' . $formatNomorSurat->id,
        //     'nama' => 'required|string|max:255|unique:format_nomor_surats,nama,' . $formatNomorSurat->id,
        // ], [
        //     'kode.unique' => 'Kode format nomor surat sudah ada.',
        //     'nama.unique' => 'Nama format nomor surat sudah ada.',
        // ]);     
        // $formatNomorSurat->update($request->only(['kode', 'nama']));
        // return redirect()->route('format_nomor_surats.index')->with('success', 'Format  Nomor Surat berhasil diperbarui.');
    }
    public function destroy($id)
    {
        // $formatNomorSurat = JenisSurat::findOrFail($id);
        // $formatNomorSurat->delete();
        // return redirect()->route('format_nomor_surats.index')->with('success', 'Format Nomor Surat berhasil dihapus.');
    }
}
