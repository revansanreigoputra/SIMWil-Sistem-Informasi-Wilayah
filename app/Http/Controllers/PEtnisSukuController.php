<?php

namespace App\Http\Controllers;

use App\Models\PEtnisSuku;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class PEtnisSukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $desaId = session('desa_id');
        $pEtnisSukus = PEtnisSuku::where('desa_id', $desaId)->latest()->get();
        return view('pages.potensi.potensi-sdm.etnis-suku.index', compact('pEtnisSukus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.potensi.potensi-sdm.etnis-suku.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'tanggal' => 'required|date',
                'etnis_suku' => 'required|string|max:255',
                'jumlah_laki_laki' => 'required|integer|min:0',
                'jumlah_perempuan' => 'required|integer|min:0',
            ]);

            $validatedData['jumlah_total'] = $validatedData['jumlah_laki_laki'] + $validatedData['jumlah_perempuan'];
            $validatedData['desa_id'] = session('desa_id');

            PEtnisSuku::create($validatedData);

            return redirect()->route('potensi.potensi-sdm.etnis-suku.index')->with('success', 'Data Etnis/Suku berhasil ditambahkan!');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menambahkan data: ' . $e->getMessage())->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(PEtnisSuku $pEtnisSuku)
    {
        return view('pages.potensi.potensi-sdm.etnis-suku.show', compact('pEtnisSuku'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PEtnisSuku $pEtnisSuku)
    {
        return view('pages.potensi.potensi-sdm.etnis-suku.edit', compact('pEtnisSuku'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PEtnisSuku $pEtnisSuku)
    {
        try {
            $validatedData = $request->validate([
                'tanggal' => 'required|date',
                'etnis_suku' => 'required|string|max:255',
                'jumlah_laki_laki' => 'required|integer|min:0',
                'jumlah_perempuan' => 'required|integer|min:0',
            ]);

            $validatedData['jumlah_total'] = $validatedData['jumlah_laki_laki'] + $validatedData['jumlah_perempuan'];
            $validatedData['desa_id'] = session('desa_id'); // Ensure desa_id is updated if needed, or kept consistent

            $pEtnisSuku->update($validatedData);

            return redirect()->route('potensi.potensi-sdm.etnis-suku.index')->with('success', 'Data Etnis/Suku berhasil diperbarui!');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui data: ' . $e->getMessage())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PEtnisSuku $pEtnisSuku)
    {
        try {
            $pEtnisSuku->delete();
            return redirect()->route('potensi.potensi-sdm.etnis-suku.index')->with('success', 'Data Etnis/Suku berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus data: ' . $e->getMessage());
        }
    }
}
