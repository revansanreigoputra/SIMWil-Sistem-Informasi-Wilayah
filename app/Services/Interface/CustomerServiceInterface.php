<?php

namespace App\Services\Interface;

use App\Models\Customer;

interface CustomerServiceInterface
{
    public function getAllCustomers(): \Illuminate\Support\Collection;
    public function getCustomerById(int $id): Customer;
    public function createCustomer(array $data): Customer;
    public function updateCustomer(int $id, array $data): bool;
    public function deleteCustomer(int $id): bool;
}
