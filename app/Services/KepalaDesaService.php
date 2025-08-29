<?php

namespace App\Services;

use App\Models\KepalaDesa;
use App\Repositories\Interface\KepalaDesaRepositoryInterface;
use App\Services\Interface\KepalaDesaServiceInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

final class KepalaDesaService implements KepalaDesaServiceInterface
{
    protected KepalaDesaRepositoryInterface $kepalaDesaRepository;

    /**
     * Create a new class instance.
     */
    public function __construct(
        KepalaDesaRepositoryInterface $kepalaDesaRepository
    ) {
        $this->kepalaDesaRepository = $kepalaDesaRepository;
    }

    public function getAllKepalaDesa(): \Illuminate\Support\Collection
    {
        return $this->kepalaDesaRepository->all();
    }

    public function getAllKepalaDesaPaginated(int $perPage = 15): LengthAwarePaginator
    {
        return $this->kepalaDesaRepository->getAllPaginated($perPage);
    }

    public function getAllKepalaDesaWithRelations(): \Illuminate\Support\Collection
    {
        return $this->kepalaDesaRepository->getAllWithRelations();
    }

    public function getKepalaDesaById(int $id): KepalaDesa
    {
        return $this->kepalaDesaRepository->findById($id);
    }

    public function createKepalaDesa(array $data): KepalaDesa
    {
        return $this->kepalaDesaRepository->create($data);
    }

    public function updateKepalaDesa(int $id, array $data): bool
    {
        return $this->kepalaDesaRepository->update($id, $data);
    }

    public function deleteKepalaDesa(int $id): bool
    {
        return $this->kepalaDesaRepository->delete($id);
    }
}