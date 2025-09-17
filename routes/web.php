<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\PerangkatDesaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DesaController;
use App\Http\Controllers\MasterDdkController;
use App\Http\Controllers\DataKeluargaController;
use App\Http\Controllers\MutasiController;

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

// DATA KARTU KELUARGA (KK)
Route::middleware(['auth'])->prefix('data-keluarga')->name('data_keluarga.')->group(function () {
    Route::get('/', [DataKeluargaController::class, 'index'])->middleware('permission:data_keluarga.view')->name('index');
    Route::get('/create', [DataKeluargaController::class, 'createKk'])->middleware('permission:data_keluarga.create')->name('create');
    Route::post('/store', [DataKeluargaController::class, 'storeKk'])->middleware('permission:data_keluarga.store')->name('store');
    Route::get('/laporan/kepala-keluarga', [DataKeluargaController::class, 'headsReport'])->middleware('permission:data_keluarga.report')->name('report.heads');
    // EDIT, UPDATE, DELETE tanpa permission
    Route::get('/{id}/edit', [DataKeluargaController::class, 'editKk'])->name('edit');
    Route::put('/{id}', [DataKeluargaController::class, 'updateKk'])->name('update');
    Route::delete('/{id}', [DataKeluargaController::class, 'destroyKk'])->name('destroy');
});


// DATA ANGGOTA KELUARGA (AK)
Route::middleware(['auth'])->prefix('anggota-keluarga')->name('anggota_keluarga.')->group(function () {
    Route::get('/', [DataKeluargaController::class, 'indexAnggota'])->middleware('permission:data_keluarga.view')->name('index');
    Route::get('/create', [DataKeluargaController::class, 'createAk'])->middleware('permission:data_keluarga.create')->name('create');
    Route::post('/store', [DataKeluargaController::class, 'storeAk'])->middleware('permission:data_keluarga.store')->name('store');
    Route::get('/laporan/anggota-keluarga', [DataKeluargaController::class, 'membersReport'])->middleware('permission:data_keluarga.report')->name('report.members');
    // EDIT, UPDATE, DELETE tanpa permission
    Route::get('/{id}/edit', [DataKeluargaController::class, 'editAk'])->name('edit');
    Route::put('/{id}', [DataKeluargaController::class, 'updateAk'])->name('update');
    Route::delete('/{id}', [DataKeluargaController::class, 'destroyAk'])->name('destroy');
});


// Mutasi Routes
Route::prefix('mutasi')->middleware(['auth'])->group(function() {

    Route::prefix('data')->middleware('permission:mutasi.data.view')->group(function() {
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

    Route::prefix('laporan')->middleware('permission:mutasi.laporan.view')->group(function() {
        Route::get('/', [MutasiController::class, 'laporan'])->name('mutasi.laporan.index');
        Route::get('/export', [MutasiController::class, 'exportLaporan'])->name('mutasi.laporan.export')->middleware('permission:mutasi.laporan.export');
    });

});
require __DIR__ . '/auth.php';


// routes for direct file (placeholder routes)
Route::get('/master-ddk/{table?}', [MasterDDKController::class, 'index'])->name('master.ddk.index');
