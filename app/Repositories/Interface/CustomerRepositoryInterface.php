<?php

namespace App\Repositories\Interface;

use App\Models\Customer;

interface CustomerRepositoryInterface
{
    public function all(): \Illuminate\Support\Collection;
    public function findById(int $id): Customer;
    public function create(array $data): Customer;
    public function update(int $id, array $data): bool;
    public function delete(int $id): bool;
}
