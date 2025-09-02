<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\Desa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jabatans = Jabatan::paginate(10);
        return view('pages.jabatan.index', compact('jabatans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_jabatan' => 'required|string|max:255',
        ]);

        DB::beginTransaction();
        try {
            Jabatan::create($request->only(['nama_jabatan']));

            DB::commit();
            return redirect()->route('jabatan.index')->withSuccess('Jabatan berhasil dibuat.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->withErrors('Gagal membuat jabatan: ' . $th->getMessage())->withInput();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jabatan $jabatan)
    {
        $request->validate([
            'nama_jabatan' => 'required|string|max:255',
        ]);

        DB::beginTransaction();
        try {
            $jabatan->update($request->only(['nama_jabatan']));

            DB::commit();
            return redirect()->route('jabatan.index')->withSuccess('Jabatan berhasil diperbaharui.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->withErrors('Gagal memperbaharui jabatan: ' . $th->getMessage())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jabatan $jabatan)
    {
        try {
            $jabatan->delete();
            return redirect()->route('jabatan.index')->withSuccess('Jabatan berhasil dihapus.');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors('Gagal menghapus jabatan: ' . $th->getMessage());
        }
    }
}