<?php

namespace App\Http\Controllers;

use App\Models\DampakPengolahanHutan;
use App\Models\MasterPotensi\JenisDampak;
use Illuminate\Http\Request;

class DampakPengolahanHutanController extends Controller
{
    public function index()
    {
        $desaId = session('desa_id');
        $dampakPengolahanHutans = DampakPengolahanHutan::with('desa', 'jenisDampak')->where('desa_id', $desaId)->latest()->get();
        return view('pages.potensi.sda.dampakpengolahan.index', compact('dampakPengolahanHutans'));
    }

    public function create()
    {
        $jenisDampaks = JenisDampak::all();
        return view('pages.potensi.sda.dampakpengolahan.create', compact('jenisDampaks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'jenis_dampak_id' => 'required|exists:jenis_dampak,id',
            'keterangan' => 'required|in:Ada,Tidak Ada',
        ]);

        $data = $request->all();
        $data['desa_id'] = session('desa_id');

        DampakPengolahanHutan::create($data);

        return redirect()->route('dampakpengolahan.index')->with('success', 'Data dampak pengolahan hutan berhasil ditambahkan.');
    }

    public function show(DampakPengolahanHutan $dampakpengolahan)
    {
        return view('pages.potensi.sda.dampakpengolahan.show', compact('dampakpengolahan'));
    }

    public function edit(DampakPengolahanHutan $dampakpengolahan)
    {
        $jenisDampaks = JenisDampak::all();
        return view('pages.potensi.sda.dampakpengolahan.edit', compact('dampakpengolahan', 'jenisDampaks'));
    }

    public function update(Request $request, DampakPengolahanHutan $dampakpengolahan)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'jenis_dampak_id' => 'required|exists:jenis_dampak,id',
            'keterangan' => 'required|in:Ada,Tidak Ada',
        ]);

        $dampakpengolahan->update($request->all());

        return redirect()->route('dampakpengolahan.index')->with('success', 'Data dampak pengolahan hutan berhasil diubah.');
    }

    public function destroy(DampakPengolahanHutan $dampakpengolahan)
    {
        $dampakpengolahan->delete();
        return redirect()->route('dampakpengolahan.index')->with('success', 'Data dampak pengolahan hutan berhasil dihapus.');
    }
}