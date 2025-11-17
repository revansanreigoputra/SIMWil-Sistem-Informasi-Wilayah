<?php

namespace App\Http\Controllers;

use App\Models\PAgama;
use App\Models\MasterDDK\Agama;
use App\Models\Desa; // Import Desa model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth; // Import Auth facade
use Illuminate\Support\Facades\Session; // Import Session facade

class PAgamaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        abort_if(Gate::denies('p_agama.view'), 403);

        $desaId = Session::get('desa_id'); // Get desa_id from session
        $p_agamas = PAgama::with('agama')->where('desa_id', $desaId)->latest()->get();

        return view('pages.potensi.potensi-sdm.agama.index', compact('p_agamas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        abort_if(Gate::denies('p_agama.create'), 403);

        $agamas = Agama::all();

        return view('pages.potensi.potensi-sdm.agama.create', compact('agamas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        abort_if(Gate::denies('p_agama.store'), 403);

        $validated = $request->validate([
            'tanggal' => 'required|date',
            'id_agama' => 'required|exists:agama,id',
            'laki' => 'required|integer|min:0',
            'perempuan' => 'required|integer|min:0',
        ]);

        $validated['total'] = $validated['laki'] + $validated['perempuan'];
        $validated['desa_id'] = Session::get('desa_id'); // Add desa_id from session

        PAgama::create($validated);

        return redirect()->route('potensi.potensi-sdm.agama.index')->with('success', 'Data potensi agama berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(PAgama $p_agama)
    {
        abort_if(Gate::denies('p_agama.view'), 403);

        $p_agama->load('agama');

        return view('pages.potensi.potensi-sdm.agama.show', compact('p_agama'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PAgama $p_agama)
    {
        abort_if(Gate::denies('p_agama.update'), 403);

        $agamas = Agama::all();

        return view('pages.potensi.potensi-sdm.agama.edit', compact('p_agama', 'agamas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PAgama $p_agama)
    {
        abort_if(Gate::denies('p_agama.update'), 403);

        $validated = $request->validate([
            'tanggal' => 'required|date',
            'id_agama' => 'required|exists:agama,id',
            'laki' => 'required|integer|min:0',
            'perempuan' => 'required|integer|min:0',
        ]);

        $validated['total'] = $validated['laki'] + $validated['perempuan'];
        $validated['desa_id'] = Session::get('desa_id'); // Ensure desa_id is updated or kept consistent

        $p_agama->update($validated);

        return redirect()->route('potensi.potensi-sdm.agama.index')->with('success', 'Data potensi agama berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PAgama $p_agama)
    {
        abort_if(Gate::denies('p_agama.delete'), 403);

        $p_agama->delete();

        return redirect()->route('potensi.potensi-sdm.agama.index')->with('success', 'Data potensi agama berhasil dihapus.');
    }
}
