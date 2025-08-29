<?php

namespace App\Services\Interface;

use App\Models\KepalaDesa;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface KepalaDesaServiceInterface
{
    public function getAllKepalaDesa(): \Illuminate\Support\Collection;
    public function getKepalaDesaById(int $id): KepalaDesa;
    public function createKepalaDesa(array $data): KepalaDesa;
    public function updateKepalaDesa(int $id, array $data): bool;
    public function deleteKepalaDesa(int $id): bool;
    public function getAllKepalaDesaWithRelations(): \Illuminate\Support\Collection;
    public function getAllKepalaDesaPaginated(int $perPage = 15): LengthAwarePaginator;
}