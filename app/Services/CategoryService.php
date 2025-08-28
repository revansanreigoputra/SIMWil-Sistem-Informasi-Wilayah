<?php

namespace App\Services;

use App\Models\Category;
use App\Repositories\Interface\CategoryRepositoryInterface;

class CategoryService
{

    protected CategoryRepositoryInterface $categoryRepository;
    /**
     * Create a new class instance.
     */
    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function getAllCategories(): \Illuminate\Support\Collection
    {
        return $this->categoryRepository->all();
    }

    public function getCategoryById(int $id): Category
    {
        return $this->categoryRepository->findById($id);
    }

    public function createCategory(array $data): Category
    {
        return $this->categoryRepository->create($data);
    }

    public function updateCategory(int $id, array $data): bool
    {
        return $this->categoryRepository->update($id, $data);
    }

    public function deleteCategory(int $id): bool
    {
        return $this->categoryRepository->delete($id);
    }
}
