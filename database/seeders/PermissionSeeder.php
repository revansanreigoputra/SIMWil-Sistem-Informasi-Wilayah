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
            'data_keluarga.edit',
            'data_keluarga.update',
            'data_keluarga.delete',
            'data_keluarga.destroy',
            // Anggota Keluarga Permissions
            'anggota_keluarga.view',
            'anggota_keluarga.create',
            'anggota_keluarga.store',
            'anggota_keluarga.edit',
            'anggota_keluarga.update',
            'anggota_keluarga.delete',
            'anggota_keluarga.destroy',
            'anggota_keluarga.show',
            // Mutasi permissions
            'mutasi.data.view',
            'mutasi.data.create',
            'mutasi.data.store',
            'mutasi.data.edit',
            'mutasi.data.update',
            'mutasi.data.destroy',
            'mutasi.laporan.view',
            'mutasi.laporan.export',


            // ttd (penanda tangan) permissions
            'ttd.view',
            'ttd.create',
            'ttd.store',
            'ttd.update',
            'ttd.delete',
            'data_keluarga.edit',
            'data_keluarga.update',
            'data_keluarga.delete',
            'data_keluarga.destroy',

            // Jumlah permissions
            'jumlah.view',
            'jumlah.create',
            'jumlah.store',
            'jumlah.update',
            'jumlah.delete',

            // transportasi_darat permissions
            'transportasi_darat.view',
            'transportasi_darat.create',
            'transportasi_darat.store',
            'transportasi_darat.update',
            'transportasi_darat.delete',

            // usia permissions
            'usia.view',
            'usia.create',
            'usia.store',
            'usia.update',
            'usia.delete',

            // Irigasi
            'irigasi.view',
            'irigasi.create',
            'irigasi.store',
            'irigasi.edit',
            'irigasi.update',
            'irigasi.delete',

            // apb
            'apb.view',
            'apb.create',
            'apb.store',
            'apb.edit',
            'apb.update',
            'apb.delete',


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
