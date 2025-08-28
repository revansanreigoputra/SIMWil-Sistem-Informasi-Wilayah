<?php

namespace App\Repositories;

use App\Repositories\Interface\RoleRepositoryInterface;
use Illuminate\Support\Collection;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleRepository implements RoleRepositoryInterface
{
    public function all(): \Illuminate\Support\Collection
    {
        return Role::orderBy('name', 'desc')->get();
    }

    public function findById(int $id): Role
    {
        return Role::findOrFail($id);
    }

    public function getRolePermissions(Role $role): array
    {
        return $role->permissions->pluck('name')->toArray();
    }

    public function syncPermissions(Role $role, array $permissions): void
    {
        $role->syncPermissions($permissions);
    }

    public function getGroupedPermissions(): Collection
    {
        return Permission::all()->groupBy(function ($permission) {
            return explode('.', $permission->name)[0];
        });
    }
}
