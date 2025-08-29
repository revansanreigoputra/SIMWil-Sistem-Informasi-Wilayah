<?php

namespace App\Repositories\Interface;

use App\Models\KepalaDesa;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface KepalaDesaRepositoryInterface
{
    public function all(): \Illuminate\Support\Collection;
    public function findById(int $id): KepalaDesa;
    public function create(array $data): KepalaDesa;
    public function update(int $id, array $data): bool;
    public function delete(int $id): bool;
    public function getAllWithRelations(): \Illuminate\Support\Collection;
    public function getAllPaginated(int $perPage = 15): LengthAwarePaginator;
}