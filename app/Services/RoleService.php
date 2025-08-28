<?php

namespace App\Services;

use App\Repositories\Interface\RoleRepositoryInterface;
use App\Services\Interface\RoleServiceInterface;
use Spatie\Permission\Models\Role;

class RoleService implements RoleServiceInterface
{
    protected RoleRepositoryInterface $roleRepository;

    public function __construct(RoleRepositoryInterface $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    public function getAllRoles(): \Illuminate\Support\Collection
    {
        return $this->roleRepository->all();
    }

    public function getRolePermissions(): \Illuminate\Support\Collection
    {
        return $this->roleRepository->getGroupedPermissions();
    }

    public function getRoleById(int $id): Role
    {
        return $this->roleRepository->findById($id);
    }

    public function updatePermissions(Role $role, array $permissions): void
    {
        $this->roleRepository->syncPermissions($role, $permissions);
    }

    public function getAssignedPermissionNames($role): array
    {
        return $role->permissions->pluck('name')->toArray();
    }
}
