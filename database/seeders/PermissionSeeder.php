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
            'user.view',
            'user.create',
            'user.store',
            'user.edit',
            'user.update',
            'user.delete',
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
            // data keluarga permissions
            'data_keluarga.view',
            'data_keluarga.create',
            'data_keluarga.store',
            'data_keluarga.report',
            // ttd (penanda tangan) permissions
            'ttd.view',
            'ttd.create',
            'ttd.store',
            'ttd.update',
            'ttd.delete',


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