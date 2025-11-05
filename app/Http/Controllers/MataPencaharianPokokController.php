<?php

namespace App\Http\Controllers;

use App\Models\MataPencaharianPokok;
use App\Models\MasterDDK\MataPencaharian; // Import the MataPencaharian model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MataPencaharianPokokController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $desaId = session('desa_id');
        $mataPencaharianPokoks = MataPencaharianPokok::with('mataPencaharian')->where('desa_id', $desaId)->latest()->paginate(10);
        return view('pages.potensi.potensi-sdm.mata-pencaharian-pokok.index', compact('mataPencaharianPokoks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mataPencaharians = MataPencaharian::all(); // Fetch all mata pencaharian for dropdown
        return view('pages.potensi.potensi-sdm.mata-pencaharian-pokok.create', compact('mataPencaharians'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'mata_pencaharian_id' => 'required|exists:mata_pencaharians,id',
            'laki_laki' => 'required|integer|min:0',
            'perempuan' => 'required|integer|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Gagal menambahkan data potensi mata pencaharian pokok.');
        }

        $data = $request->all();
        $data['total'] = $request->input('laki_laki') + $request->input('perempuan');
        $data['desa_id'] = session('desa_id');

        MataPencaharianPokok::create($data);

        return redirect()->route('potensi.potensi-sdm.mata-pencaharian-pokok.index')->with('success', 'Data potensi mata pencaharian pokok berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(MataPencaharianPokok $mataPencaharianPokok)
    {
        return view('pages.potensi.potensi-sdm.mata-pencaharian-pokok.show', compact('mataPencaharianPokok'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MataPencaharianPokok $mataPencaharianPokok)
    {
        $mataPencaharians = MataPencaharian::all(); // Fetch all mata pencaharian for dropdown
        return view('pages.potensi.potensi-sdm.mata-pencaharian-pokok.edit', compact('mataPencaharianPokok', 'mataPencaharians'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MataPencaharianPokok $mataPencaharianPokok)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'mata_pencaharian_id' => 'required|exists:mata_pencaharians,id',
            'laki_laki' => 'required|integer|min:0',
            'perempuan' => 'required|integer|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Gagal memperbarui data potensi mata pencaharian pokok.');
        }

        $data = $request->all();
        $data['total'] = $request->input('laki_laki') + $request->input('perempuan');
        $data['desa_id'] = session('desa_id'); // Ensure desa_id is updated if needed, or kept consistent

        $mataPencaharianPokok->update($data);

        return redirect()->route('potensi.potensi-sdm.mata-pencaharian-pokok.index')->with('success', 'Data potensi mata pencaharian pokok berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MataPencaharianPokok $mataPencaharianPokok)
    {
        $mataPencaharianPokok->delete();

        return redirect()->route('potensi.potensi-sdm.mata-pencaharian-pokok.index')->with('success', 'Data potensi mata pencaharian pokok berhasil dihapus.');
    }
}
