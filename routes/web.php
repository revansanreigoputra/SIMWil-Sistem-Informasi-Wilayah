<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DesaController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JumlahController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\MasterDdkController;
use App\Http\Controllers\DataKeluargaController;
use App\Http\Controllers\MutasiController;
use App\Http\Controllers\TtdController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PerangkatDesaController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\AnggotaKeluargaController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\GlosariumController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\TapController;
use App\Http\Controllers\LayananSurat\{
    KopTemplateController,
    FormatNomorSuratController
};

use App\Http\Controllers\MasterPerkembanganController;
use App\Http\Controllers\MasterPotensiController;
use App\Http\Controllers\LayananSuratController;
use App\Models\LayananSurat\KopTemplate;

Route::get('/', function () {
    return Auth::check()
        ? redirect()->route('dashboard')
        : app(AuthenticatedSessionController::class)->create();
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Notification routes
    // Route::prefix('notifications')->name('notifications.')->group(function () {
    //     Route::post('/mark-as-read', [NotificationController::class, 'markAsRead'])->name('mark-as-read');
    //     Route::post('/mark-all-as-read', [NotificationController::class, 'markAllAsRead'])->name('mark-all-as-read');
    //     Route::get('/count', [NotificationController::class, 'getCount'])->name('count');
    // });
});

Route::prefix('user')->group(function () {
    Route::middleware('permission:user.view')->get('/', [UserController::class, 'index'])->name('user.index');
    Route::middleware('permission:user.store')->post('/', [UserController::class, 'store'])->name('user.store');
    Route::middleware('permission:user.update')->put('/{user}', [UserController::class, 'update'])->name('user.update');
    Route::middleware('permission:user.delete')->delete('/{user}', [UserController::class, 'destroy'])->name('user.destroy');
});

Route::prefix('role')->group(function () {
    Route::middleware('permission:role.view')->get('/', [RoleController::class, 'index'])->name('role.index');
    Route::middleware('permission:role.update')->get('/{role}/edit', [RoleController::class, 'edit'])->name('role.edit');
    Route::middleware('permission:role.update')->put('/{role}', [RoleController::class, 'update'])->name('role.update');
});

// Settings routes
Route::middleware(['auth'])->prefix('pengaturan')->group(function () {
    Route::get('/', [SettingController::class, 'index'])->name('settings.index');
    Route::put('/', [SettingController::class, 'update'])->name('settings.update');
});

// Kecamatan routes
Route::middleware(['auth', 'permission:kecamatan.view'])->prefix('kecamatan')->group(function () {
    Route::get('/', [KecamatanController::class, 'index'])->name('kecamatan.index');
    Route::get('/create', [KecamatanController::class, 'create'])->middleware('permission:kecamatan.create')->name('kecamatan.create');
    Route::post('/', [KecamatanController::class, 'store'])->middleware('permission:kecamatan.store')->name('kecamatan.store');
    Route::get('/{kecamatan}', [KecamatanController::class, 'show'])->name('kecamatan.show');
    Route::get('/{kecamatan}/edit', [KecamatanController::class, 'edit'])->middleware('permission:kecamatan.update')->name('kecamatan.edit');
    Route::put('/{kecamatan}', [KecamatanController::class, 'update'])->middleware('permission:kecamatan.update')->name('kecamatan.update');
    Route::delete('/{kecamatan}', [KecamatanController::class, 'destroy'])->middleware('permission:kecamatan.delete')->name('kecamatan.destroy');
});

// Jabatan routes
Route::middleware(['auth', 'permission:jabatan.view'])->prefix('jabatan')->group(function () {
    Route::get('/', [JabatanController::class, 'index'])->name('jabatan.index');
    Route::get('/create', [JabatanController::class, 'create'])->middleware('permission:jabatan.create')->name('jabatan.create');
    Route::post('/', [JabatanController::class, 'store'])->middleware('permission:jabatan.store')->name('jabatan.store');
    Route::put('/{jabatan}', [JabatanController::class, 'update'])->middleware('permission:jabatan.update')->name('jabatan.update');
    Route::delete('/{jabatan}', [JabatanController::class, 'destroy'])->middleware('permission:jabatan.delete')->name('jabatan.destroy');
});
// Jumlah routes
Route::middleware(['auth', 'permission:jumlah.view'])->prefix('jumlah')->group(function () {
    Route::get('/', [JumlahController::class, 'index'])->name('potensi.potensi-sdm.jumlah.index');
    Route::get('/create', [JumlahController::class, 'create'])->middleware('permission:jumlah.create')->name('potensi.potensi-sdm.jumlah.create');
    Route::post('/', [JumlahController::class, 'store'])->middleware('permission:jumlah.store')->name('potensi.potensi-sdm.jumlah.store');
    Route::get('/{jumlah}', [JumlahController::class, 'show'])->name('potensi.potensi-sdm.jumlah.show');
    Route::get('/{jumlah}/edit', [JumlahController::class, 'edit'])->middleware('permission:jumlah.update')->name('potensi.potensi-sdm.jumlah.edit');
    Route::put('/{jumlah}', [JumlahController::class, 'update'])->middleware('permission:jumlah.update')->name('potensi.potensi-sdm.jumlah.update');
    Route::delete('/{jumlah}', [JumlahController::class, 'destroy'])->middleware('permission:jumlah.delete')->name('potensi.potensi-sdm.jumlah.destroy');
});

// Desa routes
Route::resource('desa', DesaController::class);

// Perangkat Desa routes
Route::middleware(['auth', 'permission:perangkat_desa.view'])->prefix('perangkat_desa')->group(function () {
    Route::get('/', [PerangkatDesaController::class, 'index'])->name('perangkat_desa.index');
    Route::get('/create', [PerangkatDesaController::class, 'create'])->middleware('permission:perangkat_desa.store')->name('perangkat_desa.create');
    Route::post('/', [PerangkatDesaController::class, 'store'])->middleware('permission:perangkat_desa.store')->name('perangkat_desa.store');
    Route::get('/{id}', [PerangkatDesaController::class, 'show'])->name('perangkat_desa.show');
    Route::get('/{id}/edit', [PerangkatDesaController::class, 'edit'])->middleware('permission:perangkat_desa.update')->name('perangkat_desa.edit');
    Route::put('/{id}', [PerangkatDesaController::class, 'update'])->middleware('permission:perangkat_desa.update')->name('perangkat_desa.update');
    Route::delete('/{id}', [PerangkatDesaController::class, 'destroy'])->middleware('permission:perangkat_desa.delete')->name('perangkat_desa.destroy');
    Route::post('/check-duplicate', [PerangkatDesaController::class, 'checkDuplicate'])->name('perangkat_desa.check_duplicate');
});
// Data Keluarga
Route::middleware(['auth'])->prefix('data-keluarga')->name('data_keluarga.')->group(function () {
    Route::get('/', [DataKeluargaController::class, 'index'])->middleware('permission:data_keluarga.view')->name('index');
    Route::get('/create', [DataKeluargaController::class, 'create'])->middleware('permission:data_keluarga.create')->name('create');
    Route::post('/', [DataKeluargaController::class, 'store'])->middleware('permission:data_keluarga.store')->name('store');
    Route::get('/laporan/kepala-keluarga', [DataKeluargaController::class, 'headsReport'])->middleware('permission:data_keluarga.report')->name('report.heads');
    Route::get('/laporan/anggota-keluarga', [DataKeluargaController::class, 'membersReport'])->middleware('permission:data_keluarga.report')->name('report.members');
    Route::get('/{dataKeluarga}/edit', [DataKeluargaController::class, 'edit'])->middleware('permission:data_keluarga.edit')->name('edit');
    Route::put('/{dataKeluarga}', [DataKeluargaController::class, 'update'])->middleware('permission:data_keluarga.update')->name('update');
    Route::delete('/{dataKeluarga}', [DataKeluargaController::class, 'destroy'])->middleware('permission:data_keluarga.delete')->name('delete');
    Route::delete('/{dataKeluarga}', [DataKeluargaController::class, 'destroy'])->middleware('permission:data_keluarga.destroy')->name('destroy');
});
// data anggota keluarga routes
Route::middleware(['auth'])->prefix('anggota-keluarga')->name('anggota_keluarga.')->group(function () {
    Route::get('/', [App\Http\Controllers\AnggotaKeluargaController::class, 'index'])->middleware('permission:anggota_keluarga.view')->name('index');
    Route::get('/create', [App\Http\Controllers\AnggotaKeluargaController::class, 'create'])->middleware('permission:anggota_keluarga.create')->name('create');
    Route::post('/', [App\Http\Controllers\AnggotaKeluargaController::class, 'store'])->middleware('permission:anggota_keluarga.store')->name('store');
    Route::get('/{anggota_keluarga}/edit', [App\Http\Controllers\AnggotaKeluargaController::class, 'edit'])->middleware('permission:anggota_keluarga.edit')->name('edit');
    Route::put('/{anggota_keluarga}', [App\Http\Controllers\AnggotaKeluargaController::class, 'update'])->middleware('permission:anggota_keluarga.update')->name('update');
    Route::delete('/{anggota_keluarga}', [App\Http\Controllers\AnggotaKeluargaController::class, 'destroy'])->middleware('permission:anggota_keluarga.delete')->name('destroy');
    Route::get('/{dataKeluarga}/show', [App\Http\Controllers\AnggotaKeluargaController::class, 'showAnggota'])->middleware('permission:anggota_keluarga.show')->name('show');
});
// DATA ANGGOTA KELUARGA (AK)
// Route::middleware(['auth'])->prefix('anggota-keluarga')->name('anggota_keluarga.')->group(function () {
//     Route::get('/', [DataKeluargaController::class, 'indexAnggota'])->middleware('permission:data_keluarga.view')->name('index');
//     Route::get('/create', [DataKeluargaController::class, 'createAk'])->middleware('permission:data_keluarga.create')->name('create');
//     Route::post('/store', [DataKeluargaController::class, 'storeAk'])->middleware('permission:data_keluarga.store')->name('store');
//     Route::get('/laporan/anggota-keluarga', [DataKeluargaController::class, 'membersReport'])->middleware('permission:data_keluarga.report')->name('report.members');
// });

// Grup menu UTAMA
Route::prefix('utama')->name('utama.')->middleware(['auth'])->group(function () {
    Route::resource('agenda', AgendaController::class);
    Route::resource('berita', BeritaController::class);
    Route::resource('glosarium', GlosariumController::class);
    Route::resource('galeri', GaleriController::class);
    Route::resource('tap', TapController::class);
    Route::prefix('galeri/{galeri}/photos')->name('galeri.photo.')->group(function () {
        Route::get('/create', [GaleriController::class, 'createPhoto'])->name('create');
        Route::post('/', [GaleriController::class, 'storePhoto'])->name('store');
        Route::delete('/{photo}', [GaleriController::class, 'destroyPhoto'])->name('destroy');
    });
});

// Penanda Tangan (TTD) routes
Route::middleware(['auth', 'permission:ttd.view'])->prefix('ttd')->group(function () {
    Route::get('/', [TtdController::class, 'index'])->name('ttd.index');
    Route::get('/create', [TtdController::class, 'create'])->middleware('permission:ttd.create')->name('ttd.create');
    Route::post('/', [TtdController::class, 'store'])->middleware('permission:ttd.store')->name('ttd.store');
    Route::get('/{ttd}', [TtdController::class, 'show'])->name('ttd.show');
    Route::get('/{ttd}/edit', [TtdController::class, 'edit'])->middleware('permission:ttd.update')->name('ttd.edit');
    Route::put('/{ttd}', [TtdController::class, 'update'])->middleware('permission:ttd.update')->name('ttd.update');
    Route::delete('/{ttd}', [TtdController::class, 'destroy'])->middleware('permission:ttd.delete')->name('ttd.destroy');
});

// Mutasi Routes
Route::prefix('mutasi')->middleware(['auth'])->group(function () {

    Route::prefix('data')->middleware('permission:mutasi.data.view')->group(function () {
        Route::get('/', [MutasiController::class, 'indexData'])->name('mutasi.data.index');
        Route::get('/create', [MutasiController::class, 'createData'])->name('mutasi.data.create')->middleware('permission:mutasi.data.create');
        Route::post('/', [MutasiController::class, 'storeData'])->name('mutasi.data.store')->middleware('permission:mutasi.data.store');
        Route::get('/{id}/edit', [MutasiController::class, 'editData'])->name('mutasi.data.edit')->middleware('permission:mutasi.data.edit');
        Route::put('/{id}', [MutasiController::class, 'updateData'])->name('mutasi.data.update')->middleware('permission:mutasi.data.update');
        Route::delete('/{id}', [MutasiController::class, 'destroyData'])->name('mutasi.data.destroy')->middleware('permission:mutasi.data.delete');
        Route::get('/{id}', [MutasiController::class, 'showData'])->name('mutasi.data.show');
    });

    // Route::prefix('masuk')->middleware('permission:mutasi.masuk.view')->group(function() {
    //     Route::get('/', [MutasiController::class, 'indexMasuk'])->name('mutasi.masuk.index');
    //     Route::get('/create', [MutasiController::class, 'createMasuk'])->name('mutasi.masuk.create')->middleware('permission:mutasi.masuk.create');
    //     Route::post('/', [MutasiController::class, 'storeMasuk'])->name('mutasi.masuk.store')->middleware('permission:mutasi.masuk.store');
    //     Route::get('/{id}/edit', [MutasiController::class, 'editMasuk'])->name('mutasi.masuk.edit')->middleware('permission:mutasi.masuk.edit');
    //     Route::put('/{id}', [MutasiController::class, 'updateMasuk'])->name('mutasi.masuk.update')->middleware('permission:mutasi.masuk.update');
    //     Route::delete('/{id}', [MutasiController::class, 'destroyMasuk'])->name('mutasi.masuk.destroy')->middleware('permission:mutasi.masuk.delete');
    //     Route::get('/{id}', [MutasiController::class, 'showMasuk'])->name('mutasi.masuk.show')->middleware('permission:mutasi.masuk.view');
    // });

    Route::prefix('laporan')->middleware('permission:mutasi.laporan.view')->group(function () {
        Route::get('/', [MutasiController::class, 'laporan'])->name('mutasi.laporan.index');
        Route::get('/export', [MutasiController::class, 'exportLaporan'])->name('mutasi.laporan.export')->middleware('permission:mutasi.laporan.export');
    });
}); 
// FINAL CONSOLIDATED LAYANAN SURAT ROUTES
Route::middleware('auth')->prefix('layanan-surat')->group(function () {
    // ==== TEMPLATE SURAT ====
    Route::prefix('template')->group(function () {
        // Kop Template Routes
        Route::get('kop-templates', [KopTemplateController::class, 'index'])->name('kop_templates.index');
        Route::get('kop-templates/create', [KopTemplateController::class, 'create'])->name('kop_templates.create');
        Route::post('kop-templates', [KopTemplateController::class, 'store'])->name('kop_templates.store');
        Route::get('kop-templates/{id}/edit', [KopTemplateController::class, 'edit'])->name('kop_templates.edit');
        Route::put('kop-templates/{id}', [KopTemplateController::class, 'update'])->name('kop_templates.update');
        Route::delete('kop-templates/{id}', [KopTemplateController::class, 'destroy'])->name('kop_templates.destroy');

        // Format Nomor Surat Routes
        Route::get('format-nomor-surats', [FormatNomorSuratController::class, 'index'])->name('format_nomor_surats.index');
        Route::get('format-nomor-surats/create', [FormatNomorSuratController::class, 'create'])->name('format_nomor_surats.create');
        Route::post('format-nomor-surats', [FormatNomorSuratController::class, 'store'])->name('format_nomor_surats.store');
        Route::get('format-nomor-surats/{id}/edit', [FormatNomorSuratController::class, 'edit'])->name('format_nomor_surats.edit');
        Route::put('format-nomor-surats/{id}', [FormatNomorSuratController::class, 'update'])->name('format_nomor_surats.update');
        Route::delete('format-nomor-surats/{id}', [FormatNomorSuratController::class, 'destroy'])->name('format_nomor_surats.destroy');
    });

    // ==== PERMOHONAN SURAT ====
    Route::get('/permohonan', [LayananSuratController::class, 'index'])->name('layanan.permohonan.index');
    Route::get('/permohonan/create', [LayananSuratController::class, 'create'])->name('layanan.permohonan.create');
    Route::get('/permohonan/edit/{id}', [LayananSuratController::class, 'edit'])->name('layanan.permohonan.edit');
    Route::get('/permohonan/delete/{id}', [LayananSuratController::class, 'delete'])->name('layanan.permohonan.delete');
    Route::get('/permohonan/cetak/{id}', [LayananSuratController::class, 'cetak'])->name('layanan.permohonan.cetak');

    // ==== PROFIL DESA ====
    Route::get('profil-desa', [LayananSuratController::class, 'profilDesa'])->name('layanan.profil_desa.index');
    Route::get('profil-desa/show', [LayananSuratController::class, 'showProfilDesa'])->name('layanan.profil_desa.show');
    Route::get('profil-desa/edit', [LayananSuratController::class, 'editProfilDesa'])->name('layanan.profil_desa.edit');
    // ==== DATA LAPORAN (submenu baru) ====
    // Laporan Surat
    Route::get('laporan/surat', [LayananSuratController::class, 'indexSurat'])->name('layanan.laporan.surat.index');
    Route::get('laporan/surat/{id}', [LayananSuratController::class, 'showSurat'])->name('layanan.laporan.surat.show');
    Route::get('laporan/surat/{id}/cetak', [LayananSuratController::class, 'cetakSurat'])->name('layanan.laporan.surat.cetak');
});
require __DIR__ . '/auth.php';

// end point for get angota keluarga by data keluarga id

Route::get('/anggota_keluarga/{id}/get_data', [AnggotaKeluargaController::class, 'get_data'])->name('anggota_keluarga.get_data');
// routes for direct file (placeholder routes)
Route::get('/master-ddk/{table?}', [MasterDDKController::class, 'index'])->name('master.ddk.index');
Route::get('/master-perkembangan', [MasterPerkembanganController::class, 'index'])->name('master.perkembangan.index');
Route::get('/master-potensi', [MasterPotensiController::class, 'index'])->name('master.potensi.index');

 // ==== Route jenis Surat ====
    Route::prefix('layanan/permohonan')->group(function() {
        Route::view('/sk_domisili', 'pages.layanan.permohonan.forms.sk_domisili')->name('permohonan.sk_domisili');
        Route::view('/sk_belum_pernah_nikah', 'pages.layanan.permohonan.forms.sk_belum_pernah_nikah')->name('permohonan.sk_belum_pernah_nikah');
        Route::view('/sp_berlakuan_baik', 'pages.layanan.permohonan.forms.sp_berlakuan_baik')->name('permohonan.sp_berlakuan_baik');
        Route::view('/sk_tidak_mampu', 'pages.layanan.permohonan.forms.sk_tidak_mampu')->name('permohonan.sk_tidak_mampu');
        Route::view('/sk_kehilangan_ktp', 'pages.layanan.permohonan.forms.sk_kehilangan_ktp')->name('permohonan.sk_kehilangan_ktp');
        Route::view('/surat_penghibaan_tanah', 'pages.layanan.permohonan.forms.surat_penghibaan_tanah')->name('permohonan.surat_penghibaan_tanah');
        Route::view('/sk_umum', 'pages.layanan.permohonan.forms.sk_umum')->name('permohonan.sk_umum');
        Route::view('/surat_rekomendasi_rt', 'pages.layanan.permohonan.forms.surat_rekomendasi_rt')->name('permohonan.surat_rekomendasi_rt');
        Route::view('/sr_ijin_mendirikan_bangunan', 'pages.layanan.permohonan.forms.sr_ijin_mendirikan_bangunan')->name('permohonan.sr_ijin_mendirikan_bangunan');
        Route::view('/sr_ijin_tempat', 'pages.layanan.permohonan.forms.sr_ijin_tempat')->name('permohonan.sr_ijin_tempat');
    });
   Route::get('/cetak/sk_domisili', function () {return view('pages.layanan.permohonan.cetak.sk_domisili');});
   Route::get('/cetak/sp_berlakuan_baik', function () {return view('pages.layanan.permohonan.cetak.sp_berlakuan_baik');});
   Route::get('/cetak/sk_tidak_mampu', function () {return view('pages.layanan.permohonan.cetak.sk_tidak_mampu');});
   Route::get('/cetak/sk_belum_pernah_nikah', function () {return view('pages.layanan.permohonan.cetak.sk_belum_pernah_nikah');});
   Route::get('/cetak/sk_kehilangan_ktp', function () {return view('pages.layanan.permohonan.cetak.sk_kehilangan_ktp');});
   Route::get('/cetak/sk_umum', function () {return view('pages.layanan.permohonan.cetak.sk_umum');});
   Route::get('/cetak/sr_ijin_mendirikan_bangunan', function () {return view('pages.layanan.permohonan.cetak.sr_ijin_mendirikan_bangunan');});
   Route::get('/cetak/sr_ijin_tempat', function () {return view('pages.layanan.permohonan.cetak.sr_ijin_tempat');});
   Route::get('/cetak/surat_penghibaan_tanah', function () {return view('pages.layanan.permohonan.surat_penghibaan_tanah');});
   Route::get('/cetak/surat_rekomendasi_rt', function () {return view('pages.layanan.permohonan.surat_rekomendasi_rt');});

// ==== POTENSI KELEMBAGAAN ==== //
Route::prefix('potensi/potensi-kelembagaan')->group(function () {

    // Pemerintah
    Route::view('/pemerintah', 'pages.potensi.kelembagaan.pemerintah.index')->name('potensi.kelembagaan.pemerintah.index');
    Route::view('/pemerintah/create', 'pages.potensi.kelembagaan.pemerintah.create')->name('potensi.kelembagaan.pemerintah.create');
    Route::view('/pemerintah/show', 'pages.potensi.kelembagaan.pemerintah.show')->name('potensi.kelembagaan.pemerintah.show'); // dummy
    Route::view('/pemerintah/edit', 'pages.potensi.kelembagaan.pemerintah.edit')->name('potensi.kelembagaan.pemerintah.edit'); // dummy
    Route::view('/pemerintah/print', 'pages.potensi.kelembagaan.pemerintah.print')->name('potensi.kelembagaan.pemerintah.print');

    // Kemasyarakatan
    Route::view('/kemasyarakatan', 'pages.potensi.kelembagaan.kemasyarakatan.index')->name('potensi.kelembagaan.kemasyarakatan.index');
    Route::view('/kemasyarakatan/create', 'pages.potensi.kelembagaan.kemasyarakatan.create')->name('potensi.kelembagaan.kemasyarakatan.create');
    Route::view('/kemasyarakatan/show', 'pages.potensi.kelembagaan.kemasyarakatan.show')->name('potensi.kelembagaan.kemasyarakatan.show'); // dummy
    Route::view('/kemasyarakatan/edit', 'pages.potensi.kelembagaan.kemasyarakatan.edit')->name('potensi.kelembagaan.kemasyarakatan.edit'); // dummy
    Route::view('/kemasyarakatan/print', 'pages.potensi.kelembagaan.kemasyarakatan.print')->name('potensi.kelembagaan.kemasyarakatan.print');

    // Politik
    Route::view('/politik', 'pages.potensi.kelembagaan.politik.index')->name('potensi.kelembagaan.politik.index');
    Route::view('/politik/create', 'pages.potensi.kelembagaan.politik.create')->name('potensi.kelembagaan.politik.create');
    Route::view('/politik/show', 'pages.potensi.kelembagaan.politik.show')->name('potensi.kelembagaan.politik.show'); // dummy
    Route::view('/politik/edit', 'pages.potensi.kelembagaan.politik.edit')->name('potensi.kelembagaan.politik.edit'); // dummy
    Route::view('/politik/print', 'pages.potensi.kelembagaan.politik.print')->name('potensi.kelembagaan.politik.print');

    // Ekonomi
    Route::view('/ekonomi', 'pages.potensi.kelembagaan.ekonomi.index')->name('potensi.kelembagaan.ekonomi.index');
    Route::view('/ekonomi/create', 'pages.potensi.kelembagaan.ekonomi.create')->name('potensi.kelembagaan.ekonomi.create');
    Route::view('/ekonomi/show', 'pages.potensi.kelembagaan.ekonomi.show')->name('potensi.kelembagaan.ekonomi.show'); // dummy
    Route::view('/ekonomi/edit', 'pages.potensi.kelembagaan.ekonomi.edit')->name('potensi.kelembagaan.ekonomi.edit'); // dummy
    Route::view('/ekonomi/print', 'pages.potensi.kelembagaan.ekonomi.print')->name('potensi.kelembagaan.ekonomi.print');

    // Pengangkutan
    Route::view('/pengangkutan', 'pages.potensi.kelembagaan.pengangkutan.index')->name('potensi.kelembagaan.pengangkutan.index');
    Route::view('/pengangkutan/create', 'pages.potensi.kelembagaan.pengangkutan.create')->name('potensi.kelembagaan.pengangkutan.create');
    Route::view('/pengangkutan/show', 'pages.potensi.kelembagaan.pengangkutan.show')->name('potensi.kelembagaan.pengangkutan.show'); // dummy
    Route::view('/pengangkutan/edit', 'pages.potensi.kelembagaan.pengangkutan.edit')->name('potensi.kelembagaan.pengangkutan.edit'); // dummy
    Route::view('/pengangkutan/print', 'pages.potensi.kelembagaan.pengangkutan.print')->name('potensi.kelembagaan.pengangkutan.print');

    // Hiburan
    Route::view('/hiburan', 'pages.potensi.kelembagaan.hiburan.index')->name('potensi.kelembagaan.hiburan.index');
    Route::view('/hiburan/create', 'pages.potensi.kelembagaan.hiburan.create')->name('potensi.kelembagaan.hiburan.create');
    Route::view('/hiburan/show', 'pages.potensi.kelembagaan.hiburan.show')->name('potensi.kelembagaan.hiburan.show'); // dummy
    Route::view('/hiburan/edit', 'pages.potensi.kelembagaan.hiburan.edit')->name('potensi.kelembagaan.hiburan.edit'); // dummy
    Route::view('/hiburan/print', 'pages.potensi.kelembagaan.hiburan.print')->name('potensi.kelembagaan.hiburan.print');

    // Pendidikan
    Route::view('/pendidikan', 'pages.potensi.kelembagaan.pendidikan.index')->name('potensi.kelembagaan.pendidikan.index');
    Route::view('/pendidikan/create', 'pages.potensi.kelembagaan.pendidikan.create')->name('potensi.kelembagaan.pendidikan.create');
    Route::view('/pendidikan/show', 'pages.potensi.kelembagaan.pendidikan.show')->name('potensi.kelembagaan.pendidikan.show'); // dummy
    Route::view('/pendidikan/edit', 'pages.potensi.kelembagaan.pendidikan.edit')->name('potensi.kelembagaan.pendidikan.edit'); // dummy
    Route::view('/pendidikan/print', 'pages.potensi.kelembagaan.pendidikan.print')->name('potensi.kelembagaan.pendidikan.print');

    // Adat
    Route::view('/adat', 'pages.potensi.kelembagaan.adat.index')->name('potensi.kelembagaan.adat.index');
    Route::view('/adat/create', 'pages.potensi.kelembagaan.adat.create')->name('potensi.kelembagaan.adat.create');
    Route::view('/adat/show', 'pages.potensi.kelembagaan.adat.show')->name('potensi.kelembagaan.adat.show'); // dummy
    Route::view('/adat/edit', 'pages.potensi.kelembagaan.adat.edit')->name('potensi.kelembagaan.adat.edit'); // dummy
    Route::view('/adat/print', 'pages.potensi.kelembagaan.adat.print')->name('potensi.kelembagaan.adat.print');

    // Keamanan
    Route::view('/keamanan', 'pages.potensi.kelembagaan.keamanan.index')->name('potensi.kelembagaan.keamanan.index');
    Route::view('/keamanan/create', 'pages.potensi.kelembagaan.keamanan.create')->name('potensi.kelembagaan.keamanan.create');
    Route::view('/keamanan/show', 'pages.potensi.kelembagaan.keamanan.show')->name('potensi.kelembagaan.keamanan.show'); // dummy
    Route::view('/keamanan/edit', 'pages.potensi.kelembagaan.keamanan.edit')->name('potensi.kelembagaan.keamanan.edit'); // dummy
    Route::view('/keamanan/print', 'pages.potensi.kelembagaan.keamanan.print')->name('potensi.kelembagaan.keamanan.print');

});
