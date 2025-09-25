<?php

namespace App\Http\Controllers;

use App\Models\P_pendidikan;
use App\Models\Pendidikan; // Import the Pendidikan model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PPendidikanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $p_pendidikans = P_pendidikan::with('pendidikan')->latest()->paginate(10);
        return view('pages.potensi.potensi-sdm.pendidikan.index', compact('p_pendidikans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pendidikans = Pendidikan::all(); // Fetch all pendidikan for dropdown
        return view('pages.potensi.potensi-sdm.pendidikan.create', compact('pendidikans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'id_pendidikan' => 'required|exists:pendidikans,id',
            'laki' => 'required|integer|min:0',
            'perempuan' => 'required|integer|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Gagal menambahkan data potensi pendidikan.');
        }

        P_pendidikan::create($request->all());

        return redirect()->route('potensi.potensi-sdm.pendidikan.index')->with('success', 'Data potensi pendidikan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(P_pendidikan $p_pendidikan)
    {
        return view('pages.potensi.potensi-sdm.pendidikan.show', compact('p_pendidikan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(P_pendidikan $p_pendidikan)
    {
        $pendidikans = Pendidikan::all(); // Fetch all pendidikan for dropdown
        return view('pages.potensi.potensi-sdm.pendidikan.edit', compact('p_pendidikan', 'pendidikans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, P_pendidikan $p_pendidikan)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'id_pendidikan' => 'required|exists:pendidikans,id',
            'laki' => 'required|integer|min:0',
            'perempuan' => 'required|integer|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Gagal memperbarui data potensi pendidikan.');
        }

        $p_pendidikan->update($request->all());

        return redirect()->route('potensi.potensi-sdm.pendidikan.index')->with('success', 'Data potensi pendidikan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(P_pendidikan $p_pendidikan)
    {
        $p_pendidikan->delete();

        return redirect()->route('potensi.potensi-sdm.pendidikan.index')->with('success', 'Data potensi pendidikan berhasil dihapus.');
    }
}
