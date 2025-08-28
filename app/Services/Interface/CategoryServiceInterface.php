<?php

namespace App\Services\Interface;

interface CategoryServiceInterface
{
    public function getAllCategories(): \Illuminate\Support\Collection;
    public function getCategoryById(int $id): \App\Models\Category;
    public function createCategory(array $data): \App\Models\Category;
    public function updateCategory(int $id, array $data): bool;
    public function deleteCategory(int $id): bool;
}

