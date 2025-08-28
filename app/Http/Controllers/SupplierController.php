<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSupplierRequest;
use App\Services\SupplierService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SupplierController extends Controller
{
    protected SupplierService $supplierService;

    public function __construct(SupplierService $supplierService)
    {
        $this->supplierService = $supplierService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suppliers = $this->supplierService->getAllSuppliers();
        return view('pages.supplier.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        abort(404);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSupplierRequest $request)
    {
        DB::beginTransaction();
        try {
            $this->supplierService->createSupplier($request->all());

            DB::commit();
            return redirect()->back()->withSuccess('Data supplier berhasil dibuat');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->withErrors("Gagal menambahkan supplier: " . $th->getMessage())->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreSupplierRequest $request, string $id)
    {
        DB::beginTransaction();
        try {
            $this->supplierService->updateSupplier($id, $request->all());

            DB::commit();
            return redirect()->back()->withSuccess('Data supplier berhasil diperbaharui');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->withErrors("Gagal memperbaharui supplier: " . $th->getMessage())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->supplierService->deleteSupplier($id);
        return redirect()->back()->withSuccess('Data supplier berhasil dihapus');
    }
}
