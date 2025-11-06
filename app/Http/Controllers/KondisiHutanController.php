<?php

namespace App\Http\Controllers;

use App\Models\KondisiHutan;
use App\Models\MasterPotensi\JenisHutan;
use Illuminate\Http\Request;

class KondisiHutanController extends Controller
{
    public function index()
    {
        $desaId = session('desa_id');
        $kondisiHutans = KondisiHutan::with('desa', 'jenisHutan')->where('desa_id', $desaId)->latest()->get();
        return view('pages.potensi.sda.kondisihutan.index', compact('kondisiHutans'));
    }

    public function create()
    {
        $jenisHutans = JenisHutan::all();
        return view('pages.potensi.sda.kondisihutan.create', compact('jenisHutans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'jenis_hutan_id' => 'required|exists:jenis_hutan,id',
            'kondisi_baik' => 'required|numeric|min:0',
            'kondisi_buruk' => 'required|numeric|min:0',
        ]);

        $data = $request->all();
        $data['desa_id'] = session('desa_id');
        $data['jumlah_luas_hutan'] = $request->kondisi_baik + $request->kondisi_buruk;


        KondisiHutan::create($data);

        return redirect()->route('kondisihutan.index')->with('success', 'Data kondisi hutan berhasil ditambahkan.');
    }

    public function show(KondisiHutan $kondisihutan)
    {
        return view('pages.potensi.sda.kondisihutan.show', compact('kondisihutan'));
    }

    public function edit(KondisiHutan $kondisihutan)
    {
        $jenisHutans = JenisHutan::all();
        return view('pages.potensi.sda.kondisihutan.edit', compact('kondisihutan', 'jenisHutans'));
    }

    public function update(Request $request, KondisiHutan $kondisihutan)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'jenis_hutan_id' => 'required|exists:jenis_hutan,id',
            'kondisi_baik' => 'required|numeric|min:0',
            'kondisi_buruk' => 'required|numeric|min:0',
        ]);

        $data = $request->all();
        $data['jumlah_luas_hutan'] = $request->kondisi_baik + $request->kondisi_buruk;

        $kondisihutan->update($data);

        return redirect()->route('kondisihutan.index')->with('success', 'Data kondisi hutan berhasil diubah.');
    }

    public function destroy(KondisiHutan $kondisihutan)
    {
        $kondisihutan->delete();
        return redirect()->route('kondisihutan.index')->with('success', 'Data kondisi hutan berhasil dihapus.');
    }
}