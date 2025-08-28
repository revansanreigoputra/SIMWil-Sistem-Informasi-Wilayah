<?php

namespace App\Services\Interface;

use Spatie\Permission\Models\Role;

interface RoleServiceInterface
{
    public function getAllRoles(): \Illuminate\Support\Collection;
    public function getRolePermissions(): \Illuminate\Support\Collection;
    public function getRoleById(int $id): Role;
    public function updatePermissions(Role $role, array $permissions): void;
    public function getAssignedPermissionNames($role): array;
}