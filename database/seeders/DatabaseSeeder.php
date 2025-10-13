<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            KecamatanSeeder::class,
            DesaSeeder::class,
            JabatanSeeder::class,
            PerangkatDesaSeeder::class,
            RoleSeeder::class,
            PermissionSeeder::class,
            SettingSeeder::class,
            HubunganKeluargaSeeder::class,
            AgamaSeeder::class,
            CacatSeeder::class,
            GolonganDarahSeeder::class,
            KBSeeder::class,
            KedudukanPajakSeeder::class,
            KewarganegaraanSeeder::class,
            LembagaSeeder::class,
            MataPencaharianSeeder::class,
            PendidikanSeeder::class,
            KategoriTransportasiSeeder::class,
            JenisTransportasiSeeder::class,
            KategoriKomunikasiSeeder::class,
            JenisKomunikasiSeeder::class,
            KomunikasiInformasiSeeder::class,
            TempatIbadahSeeder::class,
            JpolahragaSeeder::class,
            JpkesehatanSeeder::class,
            JskesehatanSeeder::class,
            JpgedungSeeder::class,
        ]);
    }
}