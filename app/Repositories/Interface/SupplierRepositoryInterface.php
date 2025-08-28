<?php

namespace App\Repositories\Interface;

use App\Models\Supplier;

interface SupplierRepositoryInterface
{
    public function all(): \Illuminate\Support\Collection;
    public function findById(int $id): Supplier;
    public function create(array $data): Supplier;
    public function update(int $id, array $data): bool;
    public function delete(int $id): bool;
}
