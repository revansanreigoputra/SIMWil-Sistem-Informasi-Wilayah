<?php

namespace App\Repositories\Interface;

interface UserRepositoryInterface
{
    public function all(): \Illuminate\Support\Collection;
    public function findById($id);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
}
