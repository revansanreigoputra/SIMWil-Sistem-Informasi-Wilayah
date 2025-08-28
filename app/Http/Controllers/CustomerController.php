<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomerRequest;
use App\Services\CustomerService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

final class CustomerController extends Controller
{
    protected CustomerService $customerService;

    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = $this->customerService->getAllCustomers();
        return view('pages.customer.index', compact('customers'));
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
    public function store(StoreCustomerRequest $request)
    {
        DB::beginTransaction();
        try {
            $this->customerService->createCustomer($request->all());

            DB::commit();
            return redirect()->back()->withSuccess('Data customer berhasil dibuat');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->withErrors("Gagal menambahkan customer: " . $th->getMessage())->withInput();
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
    public function update(StoreCustomerRequest $request, string $id)
    {
        DB::beginTransaction();
        try {
            $this->customerService->updateCustomer((int)$id, $request->all());

            DB::commit();
            return redirect()->back()->withSuccess('Data customer berhasil diperbaharui');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->withErrors("Gagal memperbaharui customer: " . $th->getMessage())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): \Illuminate\Http\RedirectResponse
    {
        $this->customerService->deleteCustomer((int)$id);
        return redirect()->back()->withSuccess('Data customer berhasil dihapus');
    }
}
