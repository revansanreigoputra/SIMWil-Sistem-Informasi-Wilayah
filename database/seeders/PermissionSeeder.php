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

            // Irigasi
            'irigasi.view',
            'irigasi.create',
            'irigasi.store',
            'irigasi.edit',
            'irigasi.update',
            'irigasi.delete',

            // usia permissions
            'usia.view',
            'usia.create',
            'usia.store',
            'usia.update',
            'usia.delete',

            // Potensi Pendidikan permissions
            'p_pendidikan.view',
            'p_pendidikan.create',
            'p_pendidikan.store',
            'p_pendidikan.update',
            'p_pendidikan.delete',

            // Potensi Mata Pencaharian Pokok permissions
            'mata_pencaharian_pokok.view',
            'mata_pencaharian_pokok.create',
            'mata_pencaharian_pokok.store',
            'mata_pencaharian_pokok.update',
            'mata_pencaharian_pokok.delete',

            // Potensi Agama permissions
            'p_agama.view',
            'p_agama.create',
            'p_agama.store',
            'p_agama.update',
            'p_agama.delete',

            // Irigasi
            'irigasi.view',
            'irigasi.create',
            'irigasi.store',
            'irigasi.edit',
            'irigasi.update',
            'irigasi.delete',

            // Sanitasi
            'sanitasi.view',
            'sanitasi.create',
            'sanitasi.store',
            'sanitasi.edit',
            'sanitasi.update',
            'sanitasi.delete',

            // Air Bersih
            'air_bersih.view',
            'air_bersih.create',
            'air_bersih.store',
            'air_bersih.update',
            'air_bersih.delete',

            // dkelurahan
            'dkelurahan.view',
            'dkelurahan.create',
            'dkelurahan.store',
            'dkelurahan.update',
            'dkelurahan.delete',

            // bpd
            'bpd.view',
            'bpd.create',
            'bpd.store',
            'bpd.update',
            'bpd.delete',

            // dusun
            'dusun.view',
            'dusun.create',
            'dusun.store',
            'dusun.update',
            'dusun.delete',
            
            // kemasyarakatan
            'kemasyarakatan.view',
            'kemasyarakatan.create',
            'kemasyarakatan.store',
            'kemasyarakatan.update',
            'kemasyarakatan.delete',

            // energi dan penerangan
            'energiPenerangan.view',
            'energiPenerangan.create',
            'energiPenerangan.store',
            'energiPenerangan.update',
            'energiPenerangan.delete',

            // apb
            'apb.view',
            'apb.create',
            'apb.store',
            'apb.edit',
            'apb.update',
            'apb.delete',


            // pengangguran
            'pengangguran.view',
            'pengangguran.create',
            'pengangguran.store',
            'pengangguran.edit',
            'pengangguran.update',
            'pengangguran.delete',

            // kesejahteraan keluarga
            'kesejahteraan.view',
            'kesejahteraan.create',
            'kesejahteraan.store',
            'kesejahteraan.edit',
            'kesejahteraan.update',
            'kesejahteraan.delete',

            // menurut sektor usaha
            'menurut_sektor_usaha.view',
            'menurut_sektor_usaha.create',
            'menurut_sektor_usaha.store',
            'menurut_sektor_usaha.edit',
            'menurut_sektor_usaha.update',
            'menurut_sektor_usaha.delete',


            // perkembangan penduduk
            'perkembangan-penduduk.view',
            'perkembangan-penduduk.create',
            'perkembangan-penduduk.store',
            'perkembangan-penduduk.edit',
            'perkembangan-penduduk.update',
            'perkembangan-penduduk.delete',
            'perkembangan-penduduk.destroy',

            // sektor pertambangan permissions
            'sektor-pertambangan.view',
            'sektor-pertambangan.create',
            'sektor-pertambangan.store',
            'sektor-pertambangan.edit',
            'sektor-pertambangan.update',
            'sektor-pertambangan.delete',
            'sektor-pertambangan.destroy',

            // subsektor kerajinan permissions
            'subsektor-kerajinan.view',
            'subsektor-kerajinan.create',
            'subsektor-kerajinan.store',
            'subsektor-kerajinan.edit',
            'subsektor-kerajinan.update',
            'subsektor-kerajinan.delete',
            'subsektor-kerajinan.destroy',

            // sektor industri pengolahan permissions
                'sektor-industri-pengolahan.view',
                'sektor-industri-pengolahan.create',
                'sektor-industri-pengolahan.store',
                'sektor-industri-pengolahan.edit',
                'sektor-industri-pengolahan.update',
                'sektor-industri-pengolahan.delete',
                'sektor-industri-pengolahan.destroy',
                
                            

            // Pertanggungjawaban
            'pertanggungjawaban.view',
            'pertanggungjawaban.create',
            'pertanggungjawaban.store',
            'pertanggungjawaban.edit',
            'pertanggungjawaban.update',
            'pertanggungjawaban.delete',

            //pembinaan Pusat
            'pembinaanpusat.view',
            'pembinaanpusat.create',
            'pembinaanpusat.store',
            'pembinaanpusat.edit',
            'pembinaanpusat.update',
            'pembinaanpusat.delete',

            //pembinaan Provinsi
            'pembinaanprovinsi.view',
            'pembinaanprovinsi.create',
            'pembinaanprovinsi.store',
            'pembinaanprovinsi.edit',
            'pembinaanprovinsi.update',
            'pembinaanprovinsi.delete',

            // potensi permissions
            'potensi.laporan.view',
            'potensi.laporan.export',

            // layanan surat permissions
            'layanan_surat.view',
            'layanan_surat.create',
            'layanan_surat.store',
            'layanan_surat.edit',
            'layanan_surat.update',
            'layanan_surat.delete',
            'layanan_surat.cetak',
            // template permissions
            'kop_template.view',
            'kop_template.create',
            'kop_template.store',
            'kop_template.edit',
            'kop_template.update',
            'kop_template.delete',
            'kop_template.destroy',

            'format_nomor_surat.view',
            'format_nomor_surat.create',
            'format_nomor_surat.store',
            'format_nomor_surat.edit',
            'format_nomor_surat.update',
            'format_nomor_surat.delete',
            'format_nomor_surat.destroy',

            // berita permissions
            'berita.view',
            'berita.create',
            'berita.update',
            'berita.delete',

            // agenda permissions
            'agenda.view',
            'agenda.create',
            'agenda.update',
            'agenda.delete',


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