<?php

namespace App\Services;

use App\Models\Supplier;
use App\Repositories\Interface\SupplierRepositoryInterface;

class SupplierService
{
    protected SupplierRepositoryInterface $supplierRepository;
    /**
     * Create a new class instance.
     */
    public function __construct(SupplierRepositoryInterface $supplierRepository)
    {
        $this->supplierRepository = $supplierRepository;
    }

    public function getAllSuppliers(): \Illuminate\Support\Collection
    {
        return $this->supplierRepository->all();
    }

    public function getSupplierById(int $id): Supplier
    {
        return $this->supplierRepository->findById($id);
    }

    public function createSupplier(array $data): Supplier
    {
        return $this->supplierRepository->create($data);
    }

    public function updateSupplier(int $id, array $data): bool
    {
        return $this->supplierRepository->update($id, $data);
    }

    public function deleteSupplier(int $id): bool
    {
        return $this->supplierRepository->delete($id);
    }
}
