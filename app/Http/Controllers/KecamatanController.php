<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KecamatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kecamatans = Kecamatan::with(['desas'])->paginate(10);
        return view('pages.kecamatan.index', compact('kecamatans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.kecamatan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kecamatan' => 'required|string|max:255|unique:kecamatans,nama_kecamatan',
        ]);

        DB::beginTransaction();
        try {
            Kecamatan::create($request->only('nama_kecamatan'));

            DB::commit();
            return redirect()->route('kecamatan.index')->withSuccess('Kecamatan berhasil dibuat.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->withErrors('Gagal membuat kecamatan: ' . $th->getMessage())->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Kecamatan $kecamatan)
    {
        $kecamatan->load(['desas']);
        return view('pages.kecamatan.show', compact('kecamatan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kecamatan $kecamatan)
    {
        return view('pages.kecamatan.edit', compact('kecamatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kecamatan $kecamatan)
    {
        $request->validate([
            'nama_kecamatan' => 'required|string|max:255|unique:kecamatans,nama_kecamatan,' . $kecamatan->id,
        ]);

        DB::beginTransaction();
        try {
            $kecamatan->update($request->only('nama_kecamatan'));

            DB::commit();
            return redirect()->route('kecamatan.index')->withSuccess('Kecamatan berhasil diperbaharui.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->withErrors('Gagal memperbaharui kecamatan: ' . $th->getMessage())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kecamatan $kecamatan)
    {
        try {
            $kecamatan->delete();
            return redirect()->route('kecamatan.index')->withSuccess('Kecamatan berhasil dihapus.');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors('Gagal menghapus kecamatan: ' . $th->getMessage());
        }
    }
}