<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TtdController;
use App\Http\Controllers\DesaController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsiaController;
use App\Http\Controllers\JumlahController;
use App\Http\Controllers\MutasiController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\MasterDdkController;
use App\Http\Controllers\DataKeluargaController;
// use App\Http\Controllers\IrigasiController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PerangkatDesaController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\TransportasiDaratController;
use App\Http\Controllers\IrigasiController;
use App\Http\Controllers\AnggotaKeluargaController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\GlosariumController;
use App\Http\Controllers\SanitasiController;
use App\Http\Controllers\DesaKelurahanController;
use App\Http\Controllers\BpdController;


use App\Http\Controllers\LayananSuratController;

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

// Prasarana Sanitasi routes
Route::middleware(['auth'])->prefix('potensi/potensi-prasarana-dan-sarana/prasarana-sanitasi')->name('potensi.potensi-prasarana-dan-sarana.prasarana-sanitasi.')->group(function () {
    Route::get('/', [SanitasiController::class, 'index'])->middleware('permission:sanitasi.view')->name('index');
    Route::get('/create', [SanitasiController::class, 'create'])->middleware('permission:sanitasi.create')->name('create');
    Route::post('/', [SanitasiController::class, 'store'])->middleware('permission:sanitasi.store')->name('store');
    Route::get('/{sanitasi}', [SanitasiController::class, 'show'])->middleware('permission:sanitasi.view')->name('show');
    Route::get('/{sanitasi}/edit', [SanitasiController::class, 'edit'])->middleware('permission:sanitasi.update')->name('edit');
    Route::put('/{sanitasi}', [SanitasiController::class, 'update'])->middleware('permission:sanitasi.update')->name('update');
    Route::delete('/{sanitasi}', [SanitasiController::class, 'destroy'])->middleware('permission:sanitasi.delete')->name('destroy');
});

// dkelurahan
Route::middleware(['auth'])->prefix('potensi/potensi-prasarana-dan-sarana/prasarana-dkelurahan')->name('potensi.potensi-prasarana-dan-sarana.prasarana-dkelurahan.')->group(function () {
    Route::get('/', [DesaKelurahanController::class, 'index'])->name('index');
    Route::get('/create', [DesaKelurahanController::class, 'create'])->name('create');
    Route::post('/', [DesaKelurahanController::class, 'store'])->name('store');
    Route::get('/{desaKelurahan}', [DesaKelurahanController::class, 'show'])->name('show');
    Route::get('/{desaKelurahan}/edit', [DesaKelurahanController::class, 'edit'])->name('edit');
    Route::put('/{desaKelurahan}', [DesaKelurahanController::class, 'update'])->name('update');
    Route::delete('/{desaKelurahan}', [DesaKelurahanController::class, 'destroy'])->name('destroy');
});

// bpd
Route::middleware(['auth'])->prefix('potensi/potensi-prasarana-dan-sarana/prasarana-bpd')->name('potensi.potensi-prasarana-dan-sarana.prasarana-bpd.')->group(function () {
    Route::get('/', [BpdController::class, 'index'])->name('index');
    Route::get('/create', [BpdController::class, 'create'])->name('create');
    Route::post('/', [BpdController::class, 'store'])->name('store');
    Route::get('/{bpd}', [BpdController::class, 'show'])->name('show');
    Route::get('/{bpd}/edit', [BpdController::class, 'edit'])->name('edit');
    Route::put('/{bpd}', [BpdController::class, 'update'])->name('update');
    Route::delete('/{bpd}', [BpdController::class, 'destroy'])->name('destroy');
});

// Prasarana Air Bersih routes
Route::middleware(['auth'])->prefix('potensi/potensi-prasarana-dan-sarana/prasarana-air-bersih')->name('potensi.potensi-prasarana-dan-sarana.prasarana-air-bersih.')->group(function () {
    Route::get('/', [App\Http\Controllers\AirBersihController::class, 'index'])->middleware('permission:air_bersih.view')->name('index');
    Route::get('/create', [App\Http\Controllers\AirBersihController::class, 'create'])->middleware('permission:air_bersih.create')->name('create');
    Route::post('/', [App\Http\Controllers\AirBersihController::class, 'store'])->middleware('permission:air_bersih.store')->name('store');
    Route::get('/{airBersih}', [App\Http\Controllers\AirBersihController::class, 'show'])->middleware('permission:air_bersih.view')->name('show');
    Route::get('/{airBersih}/edit', [App\Http\Controllers\AirBersihController::class, 'edit'])->middleware('permission:air_bersih.update')->name('edit');
    Route::put('/{airBersih}', [App\Http\Controllers\AirBersihController::class, 'update'])->middleware('permission:air_bersih.update')->name('update');
    Route::delete('/{airBersih}', [App\Http\Controllers\AirBersihController::class, 'destroy'])->middleware('permission:air_bersih.delete')->name('destroy');
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
Route::middleware(['auth', 'permission:jumlah.view'])->prefix('potensi/potensi-sdm/jumlah')->name('potensi.potensi-sdm.jumlah.')->group(function () {
    Route::get('/', [JumlahController::class, 'index'])->name('index');
    Route::get('/create', [JumlahController::class, 'create'])->middleware('permission:jumlah.create')->name('create');
    Route::post('/', [JumlahController::class, 'store'])->middleware('permission:jumlah.store')->name('store');
    Route::get('/{jumlah}', [JumlahController::class, 'show'])->name('show');
    Route::get('/{jumlah}/edit', [JumlahController::class, 'edit'])->middleware('permission:jumlah.update')->name('edit');
    Route::put('/{jumlah}', [JumlahController::class, 'update'])->middleware('permission:jumlah.update')->name('update');
    Route::delete('/{jumlah}', [JumlahController::class, 'destroy'])->middleware('permission:jumlah.delete')->name('destroy');
});

// Transportasi Darat routes
Route::middleware(['auth'])->prefix('transportasi-darat')->group(function () {
    Route::get('/', [TransportasiDaratController::class, 'index'])->middleware('permission:transportasi_darat.view')->name('potensi.potensi-prasarana-dan-sarana.transportasi-darat.index');
    Route::get('/create', [TransportasiDaratController::class, 'create'])->middleware('permission:transportasi_darat.create')->name('potensi.potensi-prasarana-dan-sarana.transportasi-darat.create');
    Route::post('/', [TransportasiDaratController::class, 'store'])->middleware('permission:transportasi_darat.store')->name('potensi.potensi-prasarana-dan-sarana.transportasi-darat.store');
    Route::get('/{transportasiDarat}', [TransportasiDaratController::class, 'show'])->middleware('permission:transportasi_darat.view')->name('potensi.potensi-prasarana-dan-sarana.transportasi-darat.show');
    Route::get('/{transportasiDarat}/edit', [TransportasiDaratController::class, 'edit'])->middleware('permission:transportasi_darat.update')->name('potensi.potensi-prasarana-dan-sarana.transportasi-darat.edit');
    Route::put('/{transportasiDarat}', [TransportasiDaratController::class, 'update'])->middleware('permission:transportasi_darat.update')->name('potensi.potensi-prasarana-dan-sarana.transportasi-darat.update');
    Route::delete('/{transportasiDarat}', [TransportasiDaratController::class, 'destroy'])->middleware('permission:transportasi_darat.delete')->name('potensi.potensi-prasarana-dan-sarana.transportasi-darat.destroy');
});

// Irigasi routes
Route::middleware(['auth'])->prefix('potensi/potensi-prasarana-dan-sarana/irigasi')->name('potensi.potensi-prasarana-dan-sarana.irigasi.')->group(function () {
    Route::get('/', [IrigasiController::class, 'index'])->name('index');
    Route::get('/create', [IrigasiController::class, 'create'])->name('create');
    Route::post('/', [IrigasiController::class, 'store'])->name('store');
    Route::get('/{irigasi}', [IrigasiController::class, 'show'])->name('show');
    Route::get('/{irigasi}/edit', [IrigasiController::class, 'edit'])->name('edit');
    Route::put('/{irigasi}', [IrigasiController::class, 'update'])->name('update');
    Route::delete('/{irigasi}', [IrigasiController::class, 'destroy'])->name('destroy');
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
    Route::get('/{anggotaKeluarga}/edit', [App\Http\Controllers\AnggotaKeluargaController::class, 'edit'])->middleware('permission:anggota_keluarga.edit')->name('edit');
    Route::put('/{anggotaKeluarga}', [App\Http\Controllers\AnggotaKeluargaController::class, 'update'])->middleware('permission:anggota_keluarga.update')->name('update');
    Route::delete('/{anggotaKeluarga}', [App\Http\Controllers\AnggotaKeluargaController::class, 'destroy'])->middleware('permission:anggota_keluarga.delete')->name('destroy');
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

Route::middleware(['auth'])->prefix('layanan-surat')->group(function () {

    // ==== TEMPLATE SURAT ====
    Route::prefix('template')->group(function () {
        Route::get('kop-surat', [LayananSuratController::class, 'templateKopSurat'])->name('layanan.template.kop_surat.index');
        Route::get('kop-surat/edit', [LayananSuratController::class, 'editKopSurat'])->name('layanan.template.kop_surat.edit');
        Route::get('kop-laporan', [LayananSuratController::class, 'templateKopLaporan'])->name('layanan.template.kop_laporan.index');
        Route::get('kop-laporan/edit', [LayananSuratController::class, 'editKopLaporan'])->name('layanan.template.kop_laporan.edit');
        Route::get('format-nomor', [LayananSuratController::class, 'templateFormatNomor'])->name('layanan.template.format_nomor.index');
        Route::get('format-nomor/edit', [LayananSuratController::class, 'editFormatNomor'])->name('layanan.template.format_nomor.edit');
        // Route::get('profil-desa', [LayananSuratController::class, 'templateProfilDesa'])->name('layanan.template.profil_desa.index');
    });
    // ==== PERMOHONAN SURAT ====
    Route::get('/permohonan', [LayananSuratController::class, 'index'])->name('layanan.permohonan.index');
    Route::get('/permohonan/create', [LayananSuratController::class, 'create'])->name('layanan.permohonan.create');
    Route::get('/permohonan/edit/{id}', [LayananSuratController::class, 'edit'])->name('layanan.permohonan.edit');
    Route::get('/permohonan/delete/{id}', [LayananSuratController::class, 'delete'])->name('layanan.permohonan.delete');
    Route::get('/permohonan/cetak/{id}', [LayananSuratController::class, 'cetak'])->name('layanan.permohonan.cetak');
    // ==== PROFIL DESA (di luar template) ====
    Route::get('profil-desa', [LayananSuratController::class, 'profilDesa'])->name('layanan.profil_desa.index');
    Route::get('profil-desa/show', [LayananSuratController::class, 'showProfilDesa'])->name('layanan.profil_desa.show');
    Route::get('profil-desa/edit', [LayananSuratController::class, 'editProfilDesa'])->name('layanan.profil_desa.edit');
});


require __DIR__ . '/auth.php';


// routes for direct file (placeholder routes)
Route::get('/master-ddk/{table?}', [MasterDDKController::class, 'index'])->name('master.ddk.index');


// Usia routes
Route::middleware(['auth', 'permission:usia.view'])->prefix('potensi/potensi-sdm/usia')->name('potensi.potensi-sdm.usia.')->group(function () {
    Route::get('/', [UsiaController::class, 'index'])->name('index');
    Route::get('/create', [UsiaController::class, 'create'])->middleware('permission:usia.create')->name('create');
    Route::post('/', [UsiaController::class, 'store'])->middleware('permission:usia.store')->name('store');
    Route::get('/{usia}', [UsiaController::class, 'show'])->name('show');
    Route::get('/{usia}/edit', [UsiaController::class, 'edit'])->middleware('permission:usia.update')->name('edit');
    Route::put('/{usia}', [UsiaController::class, 'update'])->middleware('permission:usia.update')->name('update');
    Route::delete('/{usia}', [UsiaController::class, 'destroy'])->middleware('permission:usia.delete')->name('destroy');
});

// routes for direct file (placeholder routes)
Route::get('/master-ddk/{table?}', [MasterDDKController::class, 'index'])->name('master.ddk.index');