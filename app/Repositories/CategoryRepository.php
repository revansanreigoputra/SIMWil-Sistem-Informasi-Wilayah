<?php

namespace App\Repositories;

use App\Models\Category;
use App\Repositories\Interface\CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function all(): \Illuminate\Support\Collection
    {
        return Category::all();
    }

    public function findById(int $id): Category
    {
        return Category::findOrFail($id);
    }

    public function create(array $data): Category
    {
        return Category::create($data);
    }

    public function update(int $id, array $data): bool
    {
        $category = $this->findById($id);
        return $category->update($data);
    }

    public function delete(int $id): bool
    {
        $category = $this->findById($id);
        return $category->delete();
    }
}
