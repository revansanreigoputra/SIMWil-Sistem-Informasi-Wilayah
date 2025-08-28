<?php

namespace App\Repositories\Interface;

use App\Models\Category;

interface CategoryRepositoryInterface
{
    public function all(): \Illuminate\Support\Collection;
    public function findById(int $id): Category;
    public function create(array $data): Category;
    public function update(int $id, array $data): bool;
    public function delete(int $id): bool;
}
