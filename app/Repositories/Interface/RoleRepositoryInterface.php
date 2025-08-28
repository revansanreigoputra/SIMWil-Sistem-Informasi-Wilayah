<?php

namespace App\Repositories\Interface;

use Spatie\Permission\Models\Role;

interface RoleRepositoryInterface
{
    public function all(): \Illuminate\Support\Collection;
    public function getRolePermissions(Role $role): array;
    public function findById(int $id): Role;
    public function syncPermissions(Role $role, array $permissions): void;
    public function getGroupedPermissions(): \Illuminate\Support\Collection;
}
