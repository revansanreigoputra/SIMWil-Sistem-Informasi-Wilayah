<?php

namespace App\Repositories;

use App\Models\Customer;
use App\Repositories\Interface\CustomerRepositoryInterface;

final class CustomerRepository implements CustomerRepositoryInterface
{
    public function all(): \Illuminate\Support\Collection
    {
        return Customer::all();
    }

    public function findById(int $id): Customer
    {
        return Customer::findOrFail($id);
    }

    public function create(array $data): Customer
    {
        return Customer::create($data);
    }

    public function update(int $id, array $data): bool
    {
        $customer = $this->findById($id);
        return $customer->update($data);
    }

    public function delete(int $id): bool
    {
        $customer = $this->findById($id);
        return $customer->delete();
    }
}
