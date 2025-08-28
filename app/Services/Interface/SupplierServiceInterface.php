<?php

namespace App\Services\Interface;

use App\Models\Supplier;

interface SupplierServiceInterface
{
    public function getAllSuppliers(): \Illuminate\Support\Collection;
    public function getSupplierById(int $id): Supplier;
    public function createSupplier(array $data): Supplier;
    public function updateSupplier(int $id, array $data): bool;
    public function deleteSupplier(int $id): bool;
}