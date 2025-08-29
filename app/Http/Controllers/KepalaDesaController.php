<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKepalaDesaRequest;
use App\Services\Interface\KepalaDesaServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class KepalaDesaController extends Controller
{
    protected KepalaDesaServiceInterface $kepalaDesaService;

    public function __construct(KepalaDesaServiceInterface $kepalaDesaService)
    {
        $this->kepalaDesaService = $kepalaDesaService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kepalaDesas = $this->kepalaDesaService->getAllKepalaDesaWithRelations();
        return view('pages.kepaladesa.index', compact('kepalaDesas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.kepaladesa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreKepalaDesaRequest $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->validated();

            // Handle foto upload
            if ($request->hasFile('foto')) {
                $data['foto'] = $request->file('foto')->store('kepala-desa', 'public');
            }

            $this->kepalaDesaService->createKepalaDesa($data);

            DB::commit();
            return redirect()->route('kepala-desa.index')->withSuccess('Data kepala desa berhasil dibuat');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->withErrors("Gagal menambahkan kepala desa: " . $th->getMessage())->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kepalaDesa = $this->kepalaDesaService->getKepalaDesaById((int)$id);
        return view('pages.kepaladesa.show', compact('kepalaDesa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kepalaDesa = $this->kepalaDesaService->getKepalaDesaById((int)$id);
        return view('pages.kepaladesa.edit', compact('kepalaDesa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreKepalaDesaRequest $request, string $id)
    {
        DB::beginTransaction();
        try {
            $data = $request->validated();
            $kepalaDesa = $this->kepalaDesaService->getKepalaDesaById((int)$id);

            // Handle foto upload
            if ($request->hasFile('foto')) {
                // Delete old foto if exists
                if ($kepalaDesa->foto && Storage::disk('public')->exists($kepalaDesa->foto)) {
                    Storage::disk('public')->delete($kepalaDesa->foto);
                }

                $data['foto'] = $request->file('foto')->store('kepala-desa', 'public');
            }

            $this->kepalaDesaService->updateKepalaDesa((int)$id, $data);

            DB::commit();
            return redirect()->route('kepala-desa.index')->withSuccess('Data kepala desa berhasil diperbaharui');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->withErrors("Gagal memperbaharui kepala desa: " . $th->getMessage())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $kepalaDesa = $this->kepalaDesaService->getKepalaDesaById((int)$id);

            // Delete foto if exists
            if ($kepalaDesa->foto && Storage::disk('public')->exists($kepalaDesa->foto)) {
                Storage::disk('public')->delete($kepalaDesa->foto);
            }

            $this->kepalaDesaService->deleteKepalaDesa((int)$id);
            return redirect()->route('kepala-desa.index')->withSuccess('Data kepala desa berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors("Gagal menghapus kepala desa: " . $th->getMessage());
        }
    }
}