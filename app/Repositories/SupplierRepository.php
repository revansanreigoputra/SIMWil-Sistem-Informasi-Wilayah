<?php

namespace App\Repositories;

use App\Models\Supplier;
use App\Repositories\Interface\SupplierRepositoryInterface;

class SupplierRepository implements SupplierRepositoryInterface
{
    public function all(): \Illuminate\Support\Collection
    {
        return Supplier::all();
    }

    public function findById(int $id): Supplier
    {
        return Supplier::findOrFail($id);
    }

    public function create(array $data): Supplier
    {
        return Supplier::create($data);
    }

    public function update(int $id, array $data): bool
    {
        $supplier = $this->findById($id);
        return $supplier->update($data);
    }

    public function delete(int $id): bool
    {
        $supplier = $this->findById($id);
        return $supplier->delete();
    }
}
