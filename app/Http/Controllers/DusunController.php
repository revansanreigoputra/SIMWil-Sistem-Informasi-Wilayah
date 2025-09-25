<?php

namespace App\Http\Controllers;

use App\Models\Dusun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DusunController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dusuns = Dusun::orderBy('tanggal', 'desc')->paginate(10);
        return view('pages.potensi.potensi-prasarana-dan-sarana.dusun.index', compact('dusuns'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.potensi.potensi-prasarana-dan-sarana.dusun.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'gedung_kantor' => 'nullable|in:ada,tidak ada',
            'alat_tulis_kantor' => 'nullable|in:ada,tidak ada',
            'barang_inventaris' => 'nullable|in:ada,tidak ada',
            'buku_administrasi' => 'nullable|in:ada,tidak ada',
            'jenis_kegiatan' => 'nullable|integer|min:0',
            'jumlah_pengurus' => 'nullable|integer|min:0',
            'lainnya' => 'nullable|in:ada,tidak ada',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        Dusun::create($request->all());

        return redirect()->route('potensi.potensi-prasarana-dan-sarana.prasarana-dusun.index')
            ->with('success', 'Data Dusun berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Dusun $dusun)
    {
        return view('pages.potensi.potensi-prasarana-dan-sarana.dusun.show', compact('dusun'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dusun $dusun)
    {
        return view('pages.potensi.potensi-prasarana-dan-sarana.dusun.edit', compact('dusun'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dusun $dusun)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'gedung_kantor' => 'nullable|in:ada,tidak ada',
            'alat_tulis_kantor' => 'nullable|in:ada,tidak ada',
            'barang_inventaris' => 'nullable|in:ada,tidak ada',
            'buku_administrasi' => 'nullable|in:ada,tidak ada',
            'jenis_kegiatan' => 'nullable|integer|min:0',
            'jumlah_pengurus' => 'nullable|integer|min:0',
            'lainnya' => 'nullable|in:ada,tidak ada',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $dusun->update($request->all());

        return redirect()->route('potensi.potensi-prasarana-dan-sarana.prasarana-dusun.index')
            ->with('success', 'Data Dusun berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dusun $dusun)
    {
        $dusun->delete();

        return redirect()->route('potensi.potensi-prasarana-dan-sarana.prasarana-dusun.index')
            ->with('success', 'Data Dusun berhasil dihapus.');
    }
}