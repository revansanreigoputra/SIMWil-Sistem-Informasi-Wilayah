<?php

namespace App\Http\Controllers\LayananSurat;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LayananSurat\FormatNomorSurat;

class FormatNomorSuratController extends Controller
{
    public function index()
    {
        $formatNomorSurats = FormatNomorSurat::all();
        return view('pages.layanan.template.format_nomor_surats.index', compact('formatNomorSurats'));
    }
    public function create()
    {
        return view('pages.layanan.template.format_nomor_surats.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|string|max:255|unique:format_nomor_surats,kode',
            'nama' => 'required|string|max:255|unique:format_nomor_surats,nama',
        ], [
            'kode.unique' => 'Kode format nomor surat sudah ada.',
            'nama.unique' => 'Nama format nomor surat sudah ada.',
        ]);     
        FormatNomorSurat::create($request->only(['kode', 'nama']));
        return redirect()->route('format_nomor_surats.index')->with('success', 'Format Nomor Surat berhasil dibuat.');
    }
    public function edit($id)
    {
        $formatNomorSurat = FormatNomorSurat::findOrFail($id);
        return view('pages.layanan.template.format_nomor_surats.edit', compact('formatNomorSurat'));
    }
    public function update(Request $request, $id)
    {
        $formatNomorSurat = FormatNomorSurat::findOrFail($id);
        $request->validate([
            'kode' => 'required|string|max:255|unique:format_nomor_surats,kode,' . $formatNomorSurat->id,
            'nama' => 'required|string|max:255|unique:format_nomor_surats,nama,' . $formatNomorSurat->id,
        ], [
            'kode.unique' => 'Kode format nomor surat sudah ada.',
            'nama.unique' => 'Nama format nomor surat sudah ada.',
        ]);     
        $formatNomorSurat->update($request->only(['kode', 'nama']));
        return redirect()->route('format_nomor_surats.index')->with('success', 'Format  Nomor Surat berhasil diperbarui.');
    }
    public function destroy($id)
    {
        $formatNomorSurat = FormatNomorSurat::findOrFail($id);
        $formatNomorSurat->delete();
        return redirect()->route('format_nomor_surats.index')->with('success', 'Format Nomor Surat berhasil dihapus.');
    }
}
