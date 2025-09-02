<?php

namespace App\Http\Controllers;

use App\Services\Interface\RoleServiceInterface;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    protected RoleServiceInterface $roleService;

    public function __construct(RoleServiceInterface $roleService)
    {
        $this->roleService = $roleService;
    }

    public function index()
    {
        $roles = $this->roleService->getAllRoles();
        return view('pages.roles.index', compact('roles'));
    }

    public function edit($id)
    {
        $role = $this->roleService->getRoleById($id);
        $permissions = $this->roleService->getRolePermissions();
        $rolePermissions = $this->roleService->getAssignedPermissionNames($role);

        return view('pages.roles.edit', compact('role', 'permissions', 'rolePermissions'));
    }

    public function update(Request $request, $id)
    {
        $role = $this->roleService->getRoleById($id);
        $this->roleService->updatePermissions($role, $request->permissions ?? []);
        return redirect()->route('role.index')->with('success', 'Permissions updated.');
    }
}