<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'role.view',
            'role.update',
            'category.view',
            'category.create',
            'category.store',
            'category.edit',
            'category.update',
            'category.delete',
            'supplier.view',
            'supplier.create',
            'supplier.store',
            'supplier.edit',
            'supplier.update',
            'supplier.delete',
            'customer.view',
            'customer.create',
            'customer.store',
            'customer.edit',
            'customer.update',
            'customer.delete',
            'unit.view',
            'unit.create',
            'unit.store',
            'unit.edit',
            'unit.update',
            'unit.delete',
            'product.view',
            'product.create',
            'product.store',
            'product.edit',
            'product.update',
            'product.delete',
            // Stock Management permissions
            'stock.view',
            'stock.in',
            'stock.out',
            'stock.adjustment',
            'stock.opname.view',
            'stock.opname.create',
            'stock.opname.update',
            'stock.opname.delete',
            'stock.opname.start',
            'stock.opname.complete',
            'user.view',
            'user.create',
            'user.store',
            'user.edit',
            'user.update',
            'user.delete',
            // Sales permissions
            'sales.view',
            'sales.create',
            'sales.process',
            'sales.history',
            'sales.cancel',
            // Purchase permissions
            'purchase.view',
            'purchase.create',
            'purchase.store',
            'purchase.show',
            'purchase.update',
            'purchase.delete',
            // Settings permissions
            'setting.view',
            'setting.update',
            // Kepala Desa permissions
            'kepala-desa.view',
            'kepala-desa.create',
            'kepala-desa.store',
            'kepala-desa.update',
            'kepala-desa.delete',
            // desa permissions
            'kecamatan.view',
            'kecamatan.create',
            'kecamatan.store',
            'kecamatan.update',
            'kecamatan.delete',
            // desa permissions
            'desa.view',
            'desa.create',
            'desa.store',
            'desa.update',
            'desa.delete',
            // jabatan permissions
            'jabatan.view',
            'jabatan.create',
            'jabatan.store',
            'jabatan.update',
            'jabatan.delete',
            // perangkat desa permissions
            'perangkat_desa.view',
            'perangkat_desa.create',
            'perangkat_desa.store',
            'perangkat_desa.update',
            'perangkat_desa.delete',
            // Mutasi permissions
            'mutasi.data.view',
            'mutasi.data.create',
            'mutasi.data.store',
            'mutasi.data.edit',
            'mutasi.data.update',
            'mutasi.data.destroy',
            'mutasi.laporan.view',
            'mutasi.laporan.export',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Assign permissions to adminkabupaten role
        $adminKabupatenRole = Role::where('name', 'adminkabupaten')->first();
        if ($adminKabupatenRole) {
            $adminKabupatenRole->syncPermissions($permissions);
        }

        // Assign permissions to admindesa role
        $adminDesaRole = Role::where('name', 'admindesa')->first();
        if ($adminDesaRole) {
            $adminDesaRole->syncPermissions($permissions);
        }
    }
}