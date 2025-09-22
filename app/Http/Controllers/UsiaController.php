<?php

namespace App\Http\Controllers;

use App\Models\Usia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class UsiaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usias = Usia::orderBy('tanggal', 'desc')->paginate(10);
        return view('pages.potensi.potensi-sdm.usia.index', compact('usias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.potensi.potensi-sdm.usia.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Aturan validasi
            $rules = [
                'tanggal' => 'required|date|unique:usias,tanggal',
            ];

            // Laki-laki 0–75
            foreach (range(0, 75) as $i) {
                $rules["l{$i}"] = 'nullable|integer|min:0';
            }

            // Perempuan 0–75
            foreach (range(0, 75) as $i) {
                $rules["p{$i}"] = 'nullable|integer|min:0';
            }

            // Validasi request
            $validatedData = $request->validate($rules);

            DB::beginTransaction();
            Usia::create($validatedData);
            DB::commit();

            return redirect()
                ->route('potensi.potensi-sdm.usia.index')
                ->with('success', 'Data usia berhasil ditambahkan!');
        } catch (ValidationException $e) {
            DB::rollBack();
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error storing usia: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menambahkan data usia.')->withInput();
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Usia $usia)
    {
        return view('pages.potensi.potensi-sdm.usia.show', compact('usia'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usia $usia)
    {
        return view('pages.potensi.potensi-sdm.usia.edit', compact('usia'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usia $usia)
    {
        try {
            $rules = [
                'tanggal' => 'required|date|unique:usias,tanggal,' . $usia->id,
            ];

            // Laki-laki 0–75
            foreach (range(0, 75) as $i) {
                $rules["l{$i}"] = 'nullable|integer|min:0';
            }

            // Perempuan 0–75
            foreach (range(0, 75) as $i) {
                $rules["p{$i}"] = 'nullable|integer|min:0';
            }

            $validatedData = $request->validate($rules);


            DB::beginTransaction();
            $usia->update($validatedData);
            DB::commit();

            return redirect()->route('potensi.potensi-sdm.usia.index')->with('success', 'Data usia berhasil diperbarui!');
        } catch (ValidationException $e) {
            DB::rollBack();
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error updating usia: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui data usia.')->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usia $usia)
    {
        try {
            DB::beginTransaction();
            $usia->delete();
            DB::commit();

            return redirect()->route('potensi.potensi-sdm.usia.index')->with('success', 'Data usia berhasil dihapus!');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error deleting usia: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus data usia.');
        }
    }
}
