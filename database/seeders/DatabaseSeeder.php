<?php

namespace Database\Seeders;

use App\Models\JpHiburan;
use App\Models\User;

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
            JpHiburanSeeder::class,
            AsetAtapSeeder::class,
            AsetDindingSeeder::class,
            AsetLantaiSeeder::class,
            AsetProduksiSeeder::class,
            AsetSaranaSeeder::class,
            AsetTanahSeeder::class,
            AsetLainnyaSeeder::class,
            GiziBalitaSeeder::class,
            EtnisSeeder::class,
            HidupBersihSeeder::class,
            HukumLkdSeeder::class,
            HukumLkkSeeder::class,
            KabupatenKotaSeeder::class,
            KeluargaBerencanaSeeder::class,
            KebiasaanBerobatSeeder::class,
            KejahatanSeeder::class,
            KekerasanSeeder::class,
            KesejahteraanKeluargaSeeder::class,
            KomoditasAlatPerikananSeeder::class,
            KomoditasBuahSeeder::class,
            KomoditasHasilTernakSeeder::class,
            KomoditasHutanSeeder::class,
            KomoditasIndustriSeeder::class,
            KomoditasKerajinanSeeder::class,
            KomoditasObatSeeder::class,
            KomoditasPanganSeeder::class,
            KomoditasPerikananSeeder::class,
            KomoditasSektorSeeder::class,
            KomoditasTernakSeeder::class,
            KomoditasWabahSeeder::class,
            KualitasBayiSeeder::class,
            KualitasIbuSeeder::class,
            KualitasKerjaSeeder::class,
            PemasaranHasilSeeder::class,
            PembunuhanSeeder::class,
            PenculikanSeeder::class,
            PencurianSeeder::class,
            PenentuanAnggotaBpdSeeder::class,
            PenentuanLurahSeeder::class,
            PenentuanKetuaBpdSeeder::class,
            PenentuanPerangkatDesaSeeder::class,
            PenentuanSekretarisDesaSeeder::class,
            PengurusLkdSeeder::class,
            PengurusLkkSeeder::class,
            PenjarahanSeeder::class,
            PenyakitSeeder::class,
            PerjudianSeeder::class,
            PerkelahianSeeder::class,
            PolaMakanSeeder::class,
            ProvinsiSeeder::class,
            SakitKelainanSeeder::class,
            StatusKepemilikanSeeder::class,
            TempatPerawatanSeeder::class,
            TempatpersalinanSeeder::class,
        ]);
    }
}