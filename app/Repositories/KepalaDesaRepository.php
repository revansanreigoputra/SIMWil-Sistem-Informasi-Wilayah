<?php

namespace App\Repositories;

use App\Models\KepalaDesa;
use App\Repositories\Interface\KepalaDesaRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

final class KepalaDesaRepository implements KepalaDesaRepositoryInterface
{
    public function all(): \Illuminate\Support\Collection
    {
        return KepalaDesa::all();
    }

    public function getAllWithRelations(): \Illuminate\Support\Collection
    {
        return KepalaDesa::with(['desa'])->get();
    }

    public function getAllPaginated(int $perPage = 15): LengthAwarePaginator
    {
        return KepalaDesa::with(['desa'])->paginate($perPage);
    }

    public function findById(int $id): KepalaDesa
    {
        return KepalaDesa::findOrFail($id);
    }

    public function create(array $data): KepalaDesa
    {
        return KepalaDesa::create($data);
    }

    public function update(int $id, array $data): bool
    {
        $kepalaDesa = $this->findById($id);
        return $kepalaDesa->update($data);
    }

    public function delete(int $id): bool
    {
        $kepalaDesa = $this->findById($id);
        return $kepalaDesa->delete();
    }
}