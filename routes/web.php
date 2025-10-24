<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BpdController;
use App\Http\Controllers\TtdController;
use App\Http\Controllers\DesaController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsiaController;
use App\Http\Controllers\DusunController;
use App\Http\Controllers\JumlahController;
use App\Http\Controllers\MutasiController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\MasterDdkController;
use App\Http\Controllers\DataKeluargaController;
// use App\Http\Controllers\MutasiController;
use App\Http\Controllers\APBDesaController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\DesaKelurahanController;
use App\Http\Controllers\PerangkatDesaController;
use App\Http\Controllers\PembinaanpusatController;
use App\Http\Controllers\PembinaanprovinsiController;
use App\Http\Controllers\PembinaankabupatenController;
use App\Http\Controllers\PembinaankecamatanController;
use App\Http\Controllers\OrganisasiController;
use App\Http\Controllers\MusrenbangdesaController;
// use App\Http\Controllers\IrigasiController;
// use App\Http\Controllers\NotificationController;
// use App\Http\Controllers\PerangkatDesaController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\TransportasiDaratController;
use App\Http\Controllers\PertanggungjawabanController;
// use App\Http\Controllers\PembinaanpusatController;
// use App\Http\Controllers\PembinaanprovinsiController;
// use App\Http\Controllers\IrigasiController;
// use App\Http\Controllers\NotificationController;
// use App\Http\Controllers\PerangkatDesaController;
// use App\Http\Controllers\Auth\AuthenticatedSessionController;
// use App\Http\Controllers\TransportasiDaratController;
use App\Http\Controllers\IrigasiController;
use App\Http\Controllers\AnggotaKeluargaController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\GlosariumController;
use App\Http\Controllers\SanitasiController;
// use App\Http\Controllers\DesaKelurahanController;
// use App\Http\Controllers\BpdController;
// use App\Http\Controllers\DusunController;
use App\Http\Controllers\PPendidikanController;
// use App\Http\Controllers\JumlahController;
// use App\Http\Controllers\MutasiController;
// use App\Http\Controllers\IrigasiController;
// use App\Http\Controllers\JabatanController;
// use App\Http\Controllers\ProfileController;
// use App\Http\Controllers\SettingController;
// use App\Http\Controllers\IrigasiController;
// use App\Http\Controllers\SanitasiController;
// use App\Http\Controllers\DesaKelurahanController;
// use App\Http\Controllers\BpdController;
// use App\Http\Controllers\DusunController;
use App\Http\Controllers\EnergiPeneranganController;
use App\Http\Controllers\KemasyarakatanController;
// use App\Http\Controllers\DashboardController;
// use App\Http\Controllers\GlosariumController;
// use App\Http\Controllers\KecamatanController;
// use App\Http\Controllers\MasterDdkController;
// use App\Http\Controllers\PPendidikanController;
// use App\Http\Controllers\DataKeluargaController;
// use App\Http\Controllers\LayananSuratController;
// use App\Http\Controllers\NotificationController;
// use App\Http\Controllers\PerangkatDesaController;
// use App\Http\Controllers\AnggotaKeluargaController;


// use App\Http\Controllers\TransportasiDaratController;
// use App\Http\Controllers\Auth\AuthenticatedSessionController;
// use App\Http\Controllers\DusunController;
// use App\Http\Controllers\AgendaController;
// use App\Http\Controllers\BeritaController;
// use App\Http\Controllers\GaleriController;
// use App\Http\Controllers\JumlahController;
// use App\Http\Controllers\MutasiController;
// use App\Http\Controllers\APBDesaController;
// use App\Http\Controllers\IrigasiController;
// use App\Http\Controllers\MutasiController;
// use App\Http\Controllers\JabatanController;
// use App\Http\Controllers\ProfileController;
// use App\Http\Controllers\SettingController;
// use App\Http\Controllers\SanitasiController;
// use App\Http\Controllers\IrigasiController;
// use App\Http\Controllers\DashboardController;
// use App\Http\Controllers\GlosariumController;
// use App\Http\Controllers\KecamatanController;
// use App\Http\Controllers\MasterDdkController;
use App\Http\Controllers\MataPencaharianPokokController;
// use App\Http\Controllers\PPendidikanController;
// use App\Http\Controllers\DataKeluargaController;
// use App\Http\Controllers\LayananSuratController;
// use App\Http\Controllers\NotificationController;
// use App\Http\Controllers\DesaKelurahanController;
// use App\Http\Controllers\PerangkatDesaController;
// use App\Http\Controllers\PembinaanpusatController;
// use App\Http\Controllers\AnggotaKeluargaController;
// use App\Http\Controllers\PembinaanprovinsiController;


// use App\Http\Controllers\TransportasiDaratController;
// use App\Http\Controllers\PertanggungjawabanController;
use App\Http\Controllers\SektorPertambanganController;
use App\Http\Controllers\SubsektorKerajinanController;


use App\Http\Controllers\PerkembanganPendudukController;
// use App\Http\Controllers\Auth\AuthenticatedSessionController;
// use App\Http\Controllers\Auth\AuthenticatedSessionController;
// use App\Http\Controllers\AnggotaKeluargaController;
// use App\Http\Controllers\AgendaController;
// use App\Http\Controllers\GlosariumController;
// use App\Http\Controllers\BeritaController;
// use App\Http\Controllers\GaleriController;
use App\Http\Controllers\TapController;
use App\Http\Controllers\LayananSurat\{
    KopTemplateController,
    JenisSuratController,
    PermohonanSuratController,
    LaporanSuratController,
    PermohonanMasukController
};
use App\Http\Controllers\LayananSuratController;
use App\Http\Controllers\MasterPerkembanganController;
use App\Http\Controllers\MasterPotensiController;
// use App\Http\Controllers\LayananSuratController;
use App\Http\Controllers\PengangguranController;
use App\Http\Controllers\KesejahteraanKeluargaController;
use App\Http\Controllers\MenurutSektorUsahaController;
use App\Models\LayananSurat\JenisSurat;
use App\Models\LayananSurat\KopTemplate;

// POTWNSI KELEMBAGAAN
use App\Http\Controllers\PotensiKelembagaan\PotensiKelembagaanController;
use App\Http\Controllers\PotensiKelembagaan\LembagaAdatController;
use App\Http\Controllers\PotensiKelembagaan\JasaPengangkutanController;
use App\Http\Controllers\PotensiKelembagaan\PolitikController;
use App\Http\Controllers\PotensiKelembagaan\LembagaKemasyarakatanController;
use App\Http\Controllers\PotensiKelembagaan\EkonomiController;
use App\Http\Controllers\PotensiKelembagaan\HiburanController;
use App\Http\Controllers\PotensiKelembagaan\PendidikanController;
use App\Http\Controllers\PotensiKelembagaan\LembagaKeamananController;


use App\Http\Controllers\SaranaTransportasiController;
use App\Http\Controllers\JenisTransportasiController;
use App\Http\Controllers\KomunikasiInformasiController;
use App\Http\Controllers\PrasaranaPeribadatanController;
use App\Http\Controllers\PrasaranaolahragaController;
use App\Http\Controllers\PrasaranakesehatanController;
use App\Http\Controllers\PrasaranapendidikanController;
use App\Http\Controllers\PrasaranaHiburanController;
use App\Http\Controllers\PrasaranaKebersihanController;

// use App\Models\LayananSurat\JenisSurat;
// use App\Models\LayananSurat\KopTemplate;


use App\Models\PotensiKelembagaan\PotensiKelembagaan;

Route::get('/', function () {
    return view('frontend.home');
});

// Route::get('/', function () {
//     return Auth::check()
//         ? redirect()->route('dashboard')
//         : app(AuthenticatedSessionController::class)->create();
// });

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');

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

// Energi & Penerangan routes
Route::middleware(['auth'])->prefix('potensi/potensi-prasarana-dan-sarana/energiPenerangan')->name('potensi.potensi-prasarana-dan-sarana.energiPenerangan.')->group(function () {
    Route::get('/', [EnergiPeneranganController::class, 'index'])->name('index');
    Route::get('/create', [EnergiPeneranganController::class, 'create'])->name('create');
    Route::post('/', [EnergiPeneranganController::class, 'store'])->name('store');
    Route::get('/{energiPenerangan}', [EnergiPeneranganController::class, 'show'])->name('show');
    Route::get('/{energiPenerangan}/edit', [EnergiPeneranganController::class, 'edit'])->name('edit');
    Route::put('/{energiPenerangan}', [EnergiPeneranganController::class, 'update'])->name('update');
    Route::delete('/{energiPenerangan}', [EnergiPeneranganController::class, 'destroy'])->name('destroy');
});

// kemasyarakatan
Route::middleware(['auth'])->prefix('potensi/potensi-prasarana-dan-sarana/kemasyarakatan')->name('potensi.potensi-prasarana-dan-sarana.kemasyarakatan.')->group(function () {
        Route::get('/', [KemasyarakatanController::class, 'index'])->name('index');
        Route::get('/create', [KemasyarakatanController::class, 'create'])->name('create');
        Route::post('/', [KemasyarakatanController::class, 'store'])->name('store');
        Route::get('/{kemasyarakatan}', [KemasyarakatanController::class, 'show'])->name('show');
        Route::get('/{kemasyarakatan}/edit', [KemasyarakatanController::class, 'edit'])->name('edit');
        Route::put('/{kemasyarakatan}', [KemasyarakatanController::class, 'update'])->name('update');
        Route::delete('/{kemasyarakatan}', [KemasyarakatanController::class, 'destroy'])->name('destroy');
    });

// Peribadatan
Route::middleware(['auth'])->prefix('potensi/potensi-prasarana-dan-sarana/peribadatan')->name('potensi.potensi-prasarana-dan-sarana.peribadatan.')->group(function () {
    Route::get('/', [PrasaranaPeribadatanController::class, 'index'])->name('index');
    Route::get('/create', [PrasaranaPeribadatanController::class, 'create'])->name('create');
    Route::post('/', [PrasaranaPeribadatanController::class, 'store'])->name('store');
    Route::get('/{prasarana_peribadatan}', [PrasaranaPeribadatanController::class, 'show'])->name('show');
    Route::get('/{prasarana_peribadatan}/edit', [PrasaranaPeribadatanController::class, 'edit'])->name('edit');
    Route::put('/{prasarana_peribadatan}', [PrasaranaPeribadatanController::class, 'update'])->name('update');
    Route::delete('/{prasarana_peribadatan}', [PrasaranaPeribadatanController::class, 'destroy'])->name('destroy');
});

// Olahraga
Route::middleware(['auth'])->prefix('potensi/potensi-prasarana-dan-sarana/olahraga')->name('potensi.potensi-prasarana-dan-sarana.olahraga.')->group(function () {
    Route::get('/', [PrasaranaolahragaController::class, 'index'])->name('index');
    Route::get('/create', [PrasaranaolahragaController::class, 'create'])->name('create');
    Route::post('/', [PrasaranaolahragaController::class, 'store'])->name('store');
    Route::get('/{prasarana_olahraga}', [PrasaranaolahragaController::class, 'show'])->name('show');
    Route::get('/{prasarana_olahraga}/edit', [PrasaranaolahragaController::class, 'edit'])->name('edit');
    Route::put('/{prasarana_olahraga}', [PrasaranaolahragaController::class, 'update'])->name('update');
    Route::delete('/{prasarana_olahraga}', [PrasaranaolahragaController::class, 'destroy'])->name('destroy');
});

// Kesehatan
Route::middleware(['auth'])->prefix('potensi/potensi-prasarana-dan-sarana/kesehatan')->name('potensi.potensi-prasarana-dan-sarana.kesehatan.')->group(function () {
    Route::get('/', [PrasaranakesehatanController::class, 'index'])->name('index');
    Route::get('/create', [PrasaranakesehatanController::class, 'create'])->name('create');
    Route::post('/', [PrasaranakesehatanController::class, 'store'])->name('store');
    Route::get('/{prasarana_kesehatan}', [PrasaranakesehatanController::class, 'show'])->name('show');
    Route::get('/{prasarana_kesehatan}/edit', [PrasaranakesehatanController::class, 'edit'])->name('edit');
    Route::put('/{prasarana_kesehatan}', [PrasaranakesehatanController::class, 'update'])->name('update');
    Route::delete('/{prasarana_kesehatan}', [PrasaranakesehatanController::class, 'destroy'])->name('destroy');
});

// Sarana Kesehatan
Route::middleware(['auth'])->prefix('potensi/potensi-prasarana-dan-sarana/skesehatan')->name('potensi.potensi-prasarana-dan-sarana.skesehatan.')->group(function () {
    Route::get('/', [App\Http\Controllers\SaranakesehatanController::class, 'index'])->name('index');
    Route::get('/create', [App\Http\Controllers\SaranakesehatanController::class, 'create'])->name('create');
    Route::post('/', [App\Http\Controllers\SaranakesehatanController::class, 'store'])->name('store');
    Route::get('/{saranakesehatan}', [App\Http\Controllers\SaranakesehatanController::class, 'show'])->name('show');
    Route::get('/{saranakesehatan}/edit', [App\Http\Controllers\SaranakesehatanController::class, 'edit'])->name('edit');
    Route::put('/{saranakesehatan}', [App\Http\Controllers\SaranakesehatanController::class, 'update'])->name('update');
    Route::delete('/{saranakesehatan}', [App\Http\Controllers\SaranakesehatanController::class, 'destroy'])->name('destroy');
});

// Prasarana Pendidikan
Route::middleware(['auth'])->prefix('potensi/potensi-prasarana-dan-sarana/ppendidikan')->name('potensi.potensi-prasarana-dan-sarana.ppendidikan.')->group(function () {
    Route::get('/', [App\Http\Controllers\PrasaranapendidikanController::class, 'index'])->name('index');
    Route::get('/create', [App\Http\Controllers\PrasaranapendidikanController::class, 'create'])->name('create');
    Route::post('/', [App\Http\Controllers\PrasaranapendidikanController::class, 'store'])->name('store');
    Route::get('/{prasaranapendidikan}', [App\Http\Controllers\PrasaranapendidikanController::class, 'show'])->name('show');
    Route::get('/{prasaranapendidikan}/edit', [App\Http\Controllers\PrasaranapendidikanController::class, 'edit'])->name('edit');
    Route::put('/{prasaranapendidikan}', [App\Http\Controllers\PrasaranapendidikanController::class, 'update'])->name('update');
    Route::delete('/{prasaranapendidikan}', [App\Http\Controllers\PrasaranapendidikanController::class, 'destroy'])->name('destroy');
});

// Prasarana Hiburan
Route::middleware(['auth'])->prefix('potensi/potensi-prasarana-dan-sarana/hiburan')->name('potensi.potensi-prasarana-dan-sarana.hiburan.')->group(function () {
    Route::get('/', [App\Http\Controllers\PrasaranaHiburanController::class, 'index'])->name('index');
    Route::get('/create', [App\Http\Controllers\PrasaranaHiburanController::class, 'create'])->name('create');
    Route::post('/', [App\Http\Controllers\PrasaranaHiburanController::class, 'store'])->name('store');
    Route::get('/{prasaranahiburan}', [App\Http\Controllers\PrasaranaHiburanController::class, 'show'])->name('show');
    Route::get('/{prasaranahiburan}/edit', [App\Http\Controllers\PrasaranaHiburanController::class, 'edit'])->name('edit');
    Route::put('/{prasaranahiburan}', [App\Http\Controllers\PrasaranaHiburanController::class, 'update'])->name('update');
    Route::delete('/{prasaranahiburan}', [App\Http\Controllers\PrasaranaHiburanController::class, 'destroy'])->name('destroy');
});

// Prasarana Kebersihan
Route::middleware(['auth'])->prefix('potensi/potensi-prasarana-dan-sarana/kebersihan')->name('potensi.potensi-prasarana-dan-sarana.kebersihan.')->group(function () {
    Route::get('/', [App\Http\Controllers\PrasaranaKebersihanController::class, 'index'])->name('index');
    Route::get('/create', [App\Http\Controllers\PrasaranaKebersihanController::class, 'create'])->name('create');
    Route::post('/', [App\Http\Controllers\PrasaranaKebersihanController::class, 'store'])->name('store');
    Route::get('/{prasaranakebersihan}', [App\Http\Controllers\PrasaranaKebersihanController::class, 'show'])->name('show');
    Route::get('/{prasaranakebersihan}/edit', [App\Http\Controllers\PrasaranaKebersihanController::class, 'edit'])->name('edit');
    Route::put('/{prasaranakebersihan}', [App\Http\Controllers\PrasaranaKebersihanController::class, 'update'])->name('update');
    Route::delete('/{prasaranakebersihan}', [App\Http\Controllers\PrasaranaKebersihanController::class, 'destroy'])->name('destroy');
});

// dusun
Route::middleware(['auth'])->prefix('potensi/potensi-prasarana-dan-sarana/prasarana-dusun')->name('potensi.potensi-prasarana-dan-sarana.prasarana-dusun.')->group(function () {
    Route::get('/', [DusunController::class, 'index'])->name('index');
    Route::get('/create', [DusunController::class, 'create'])->name('create');
    Route::post('/', [DusunController::class, 'store'])->name('store');
    Route::get('/{dusun}', [DusunController::class, 'show'])->name('show');
    Route::get('/{dusun}/edit', [DusunController::class, 'edit'])->name('edit');
    Route::put('/{dusun}', [DusunController::class, 'update'])->name('update');
    Route::delete('/{dusun}', [DusunController::class, 'destroy'])->name('destroy');
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

// Potensi Pendidikan routes
Route::middleware(['auth', 'permission:p_pendidikan.view'])->prefix('potensi/potensi-sdm/pendidikan')->name('potensi.potensi-sdm.pendidikan.')->group(function () {
    Route::get('/', [PPendidikanController::class, 'index'])->name('index');
    Route::get('/create', [PPendidikanController::class, 'create'])->middleware('permission:p_pendidikan.create')->name('create');
    Route::post('/', [PPendidikanController::class, 'store'])->middleware('permission:p_pendidikan.store')->name('store');
    Route::get('/{p_pendidikan}', [PPendidikanController::class, 'show'])->name('show');
    Route::get('/{p_pendidikan}/edit', [PPendidikanController::class, 'edit'])->middleware('permission:p_pendidikan.update')->name('edit');
    Route::put('/{p_pendidikan}', [PPendidikanController::class, 'update'])->middleware('permission:p_pendidikan.update')->name('update');
    Route::delete('/{p_pendidikan}', [PPendidikanController::class, 'destroy'])->middleware('permission:p_pendidikan.delete')->name('destroy');
});

// Potensi Mata Pencaharian Pokok routes
Route::middleware(['auth', 'permission:mata_pencaharian_pokok.view'])->prefix('potensi/potensi-sdm/mata-pencaharian-pokok')->name('potensi.potensi-sdm.mata-pencaharian-pokok.')->group(function () {
    Route::get('/', [MataPencaharianPokokController::class, 'index'])->name('index');
    Route::get('/create', [MataPencaharianPokokController::class, 'create'])->middleware('permission:mata_pencaharian_pokok.create')->name('create');
    Route::post('/', [MataPencaharianPokokController::class, 'store'])->middleware('permission:mata_pencaharian_pokok.store')->name('store');
    Route::get('/{mataPencaharianPokok}', [MataPencaharianPokokController::class, 'show'])->name('show');
    Route::get('/{mataPencaharianPokok}/edit', [MataPencaharianPokokController::class, 'edit'])->middleware('permission:mata_pencaharian_pokok.update')->name('edit');
    Route::put('/{mataPencaharianPokok}', [MataPencaharianPokokController::class, 'update'])->middleware('permission:mata_pencaharian_pokok.update')->name('update');
    Route::delete('/{mataPencaharianPokok}', [MataPencaharianPokokController::class, 'destroy'])->middleware('permission:mata_pencaharian_pokok.delete')->name('destroy');
});

// Potensi Agama routes
Route::middleware(['auth', 'permission:p_agama.view'])->prefix('potensi/potensi-sdm/agama')->name('potensi.potensi-sdm.agama.')->group(function () {
    Route::get('/', [App\Http\Controllers\PAgamaController::class, 'index'])->name('index');
    Route::get('/create', [App\Http\Controllers\PAgamaController::class, 'create'])->middleware('permission:p_agama.create')->name('create');
    Route::post('/', [App\Http\Controllers\PAgamaController::class, 'store'])->middleware('permission:p_agama.store')->name('store');
    Route::get('/{p_agama}', [App\Http\Controllers\PAgamaController::class, 'show'])->name('show');
    Route::get('/{p_agama}/edit', [App\Http\Controllers\PAgamaController::class, 'edit'])->middleware('permission:p_agama.update')->name('edit');
    Route::put('/{p_agama}', [App\Http\Controllers\PAgamaController::class, 'update'])->middleware('permission:p_agama.update')->name('update');
    Route::delete('/{p_agama}', [App\Http\Controllers\PAgamaController::class, 'destroy'])->middleware('permission:p_agama.delete')->name('destroy');
});

// Potensi Kewarganegaraan routes
Route::middleware(['auth', 'permission:p_kewarganegaraan.view'])->prefix('potensi/potensi-sdm/kewarganegaraan')->name('potensi.potensi-sdm.kewarganegaraan.')->group(function () {
    Route::get('/', [App\Http\Controllers\PKewarganegaraanController::class, 'index'])->name('index');
    Route::get('/create', [App\Http\Controllers\PKewarganegaraanController::class, 'create'])->middleware('permission:p_kewarganegaraan.create')->name('create');
    Route::post('/', [App\Http\Controllers\PKewarganegaraanController::class, 'store'])->middleware('permission:p_kewarganegaraan.store')->name('store');
    Route::get('/{pKewarganegaraan}', [App\Http\Controllers\PKewarganegaraanController::class, 'show'])->name('show');
    Route::get('/{pKewarganegaraan}/edit', [App\Http\Controllers\PKewarganegaraanController::class, 'edit'])->middleware('permission:p_kewarganegaraan.update')->name('edit');
    Route::put('/{pKewarganegaraan}', [App\Http\Controllers\PKewarganegaraanController::class, 'update'])->middleware('permission:p_kewarganegaraan.update')->name('update');
    Route::delete('/{pKewarganegaraan}', [App\Http\Controllers\PKewarganegaraanController::class, 'destroy'])->middleware('permission:p_kewarganegaraan.delete')->name('destroy');
});

// Potensi Cacat routes
Route::middleware(['auth', 'permission:p_cacat.view'])->prefix('potensi/potensi-sdm/cacat')->name('potensi.potensi-sdm.cacat.')->group(function () {
    Route::get('/', [App\Http\Controllers\PCacatController::class, 'index'])->name('index');
    Route::get('/create', [App\Http\Controllers\PCacatController::class, 'create'])->middleware('permission:p_cacat.create')->name('create');
    Route::post('/', [App\Http\Controllers\PCacatController::class, 'store'])->middleware('permission:p_cacat.store')->name('store');
    Route::get('/{pCacat}', [App\Http\Controllers\PCacatController::class, 'show'])->name('show');
    Route::get('/{pCacat}/edit', [App\Http\Controllers\PCacatController::class, 'edit'])->middleware('permission:p_cacat.update')->name('edit');
    Route::put('/{pCacat}', [App\Http\Controllers\PCacatController::class, 'update'])->middleware('permission:p_cacat.update')->name('update');
    Route::delete('/{pCacat}', [App\Http\Controllers\PCacatController::class, 'destroy'])->middleware('permission:p_cacat.delete')->name('destroy');
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

// Komunikasi dan Informasi
Route::middleware(['auth'])->prefix('komunikasiinformasi')->group(function () {
    Route::get('/', [KomunikasiInformasiController::class, 'index'])->middleware('permission:komunikasiinformasi.view')->name('potensi.potensi-prasarana-dan-sarana.komunikasiinformasi.index');
    Route::get('/create', [KomunikasiInformasiController::class, 'create'])->middleware('permission:komunikasiinformasi.create')->name('potensi.potensi-prasarana-dan-sarana.komunikasiinformasi.create');
    Route::post('/', [KomunikasiInformasiController::class, 'store'])->middleware('permission:komunikasiinformasi.store')->name('potensi.potensi-prasarana-dan-sarana.komunikasiinformasi.store');
    Route::get('/{komunikasi_informasi}', [KomunikasiInformasiController::class, 'show'])->middleware('permission:komunikasiinformasi.view')->name('potensi.potensi-prasarana-dan-sarana.komunikasiinformasi.show');
    Route::get('/{komunikasi_informasi}/edit', [KomunikasiInformasiController::class, 'edit'])->middleware('permission:komunikasiinformasi.update')->name('potensi.potensi-prasarana-dan-sarana.komunikasiinformasi.edit');
    Route::put('/{komunikasi_informasi}', [KomunikasiInformasiController::class, 'update'])->middleware('permission:komunikasiinformasi.update')->name('potensi.potensi-prasarana-dan-sarana.komunikasiinformasi.update');
    Route::delete('/{komunikasi_informasi}', [KomunikasiInformasiController::class, 'destroy'])->middleware('permission:komunikasiinformasi.delete')->name('potensi.potensi-prasarana-dan-sarana.komunikasiinformasi.destroy');
});

Route::get('/get-jenis-komunikasi-by-kategori/{id}', [\App\Http\Controllers\KomunikasiInformasiController::class, 'getJenisByKategori']);

// Sarana Transportasi routes
Route::middleware(['auth'])->prefix('angkutan')->group(function () {
    Route::get('/', [SaranaTransportasiController::class, 'index'])->middleware('permission:angkutan.view')->name('potensi.potensi-prasarana-dan-sarana.angkutan.index');
    Route::get('/create', [SaranaTransportasiController::class, 'create'])->middleware('permission:angkutan.create')->name('potensi.potensi-prasarana-dan-sarana.angkutan.create');
    Route::post('/', [SaranaTransportasiController::class, 'store'])->middleware('permission:angkutan.create')->name('potensi.potensi-prasarana-dan-sarana.angkutan.store');
    Route::get('/{saranaTransportasi}', [SaranaTransportasiController::class, 'show'])->middleware('permission:angkutan.view')->name('potensi.potensi-prasarana-dan-sarana.angkutan.show');
    Route::get('/{saranaTransportasi}/edit', [SaranaTransportasiController::class, 'edit'])->middleware('permission:angkutan.update')->name('potensi.potensi-prasarana-dan-sarana.angkutan.edit');
    Route::put('/{saranaTransportasi}', [SaranaTransportasiController::class, 'update'])->middleware('permission:angkutan.update')->name('potensi.potensi-prasarana-dan-sarana.angkutan.update');
    Route::delete('/{saranaTransportasi}', [SaranaTransportasiController::class, 'destroy'])->middleware('permission:angkutan.delete')->name('potensi.potensi-prasarana-dan-sarana.angkutan.destroy');
});

Route::get('/get-jenis-by-kategori/{kategori_id}', [JenisTransportasiController::class, 'getByKategori']);

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

//APB Desa Routes
Route::middleware(['auth'])->prefix('perkembangan/pemerintahdesadankelurahan/apbdesa')->name('perkembangan.pemerintahdesadankelurahan.apbdesa.')->group(function () {
    Route::get('/', [APBDesaController::class, 'index'])->name('index');
    Route::get('/create', [APBDesaController::class, 'create'])->name('create');
    Route::post('/', [APBDesaController::class, 'store'])->name('store');
    Route::get('/{apbdesa}', [APBDesaController::class, 'show'])->name('show');
    Route::get('/{apbdesa}/edit', [APBDesaController::class, 'edit'])->name('edit');
    Route::put('/{apbdesa}', [APBDesaController::class, 'update'])->name('update');
    Route::delete('/{apbdesa}', [APBDesaController::class, 'destroy'])->name('destroy');
});

// Pengangguran
Route::middleware(['auth'])
    ->prefix('perkembangan/ekonomimasyarakat/pengangguran')
    ->name('perkembangan.ekonomimasyarakat.pengangguran.')
    ->group(function () {
        Route::get('/', [\App\Http\Controllers\PengangguranController::class, 'index'])->name('index');
        Route::get('/create', [\App\Http\Controllers\PengangguranController::class, 'create'])->name('create');
        Route::post('/', [\App\Http\Controllers\PengangguranController::class, 'store'])->name('store');
        Route::get('/{pengangguran}', [\App\Http\Controllers\PengangguranController::class, 'show'])->name('show');
        Route::get('/{pengangguran}/edit', [\App\Http\Controllers\PengangguranController::class, 'edit'])->name('edit');
        Route::put('/{pengangguran}', [\App\Http\Controllers\PengangguranController::class, 'update'])->name('update');
        Route::delete('/{pengangguran}', [\App\Http\Controllers\PengangguranController::class, 'destroy'])->name('destroy');
    });

// Kesejahteraan Keluarga
Route::middleware(['auth'])->prefix('perkembangan/ekonomimasyarakat/kesejahteraan_keluarga')
    ->name('perkembangan.ekonomimasyarakat.kesejahteraan_keluarga.')
    ->group(function () {
        Route::get('/', [KesejahteraanKeluargaController::class, 'index'])->name('index');
        Route::get('/create', [KesejahteraanKeluargaController::class, 'create'])->name('create');
        Route::post('/', [KesejahteraanKeluargaController::class, 'store'])->name('store');
        Route::get('/{id}', [KesejahteraanKeluargaController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [KesejahteraanKeluargaController::class, 'edit'])->name('edit');
        Route::put('/{id}', [KesejahteraanKeluargaController::class, 'update'])->name('update');
        Route::delete('/{id}', [KesejahteraanKeluargaController::class, 'destroy'])->name('destroy');
    });

// Menurut Sektor Usaha
Route::middleware(['auth'])
    ->prefix('perkembangan/pendapatanperkapital/menurut_sektor_usaha')
    ->name('perkembangan.pendapatanperkapital.menurut_sektor_usaha.')
    ->group(function () {
        Route::get('/', [MenurutSektorUsahaController::class, 'index'])->name('index');
        Route::get('/create', [MenurutSektorUsahaController::class, 'create'])->name('create');
        Route::post('/', [MenurutSektorUsahaController::class, 'store'])->name('store');
        Route::get('/{menurut_sektor_usaha}', [MenurutSektorUsahaController::class, 'show'])->name('show');
        Route::get('/{menurut_sektor_usaha}/edit', [MenurutSektorUsahaController::class, 'edit'])->name('edit');
        Route::put('/{menurut_sektor_usaha}', [MenurutSektorUsahaController::class, 'update'])->name('update');
        Route::delete('/{menurut_sektor_usaha}', [MenurutSektorUsahaController::class, 'destroy'])->name('destroy');
    });


// AJAX: Ambil desa berdasarkan kecamatan
Route::get('/get-desa-by-kecamatan', [\App\Http\Controllers\PengangguranController::class, 'getDesaByKecamatan'])->name('getDesaByKecamatan');



// pertanggungjawaban Routes
Route::middleware(['auth'])->prefix('perkembangan/pemerintahdesadankelurahan/pertanggungjawaban')->name('perkembangan.pemerintahdesadankelurahan.pertanggungjawaban.')->group(function () {
    Route::get('/', [PertanggungjawabanController::class, 'index'])->name('index');
    Route::get('/create', [PertanggungjawabanController::class, 'create'])->name('create');
    Route::post('/', [PertanggungjawabanController::class, 'store'])->name('store');
    Route::get('/{pertanggungjawaban}', [PertanggungjawabanController::class, 'show'])->name('show');
    Route::get('/{pertanggungjawaban}/edit', [PertanggungjawabanController::class, 'edit'])->name('edit');
    Route::put('/{pertanggungjawaban}', [PertanggungjawabanController::class, 'update'])->name('update');
    Route::delete('/{pertanggungjawaban}', [PertanggungjawabanController::class, 'destroy'])->name('destroy');
});

// pembinaanpusat Routes
Route::middleware(['auth'])->prefix('perkembangan/pemerintahdesadankelurahan/pembinaanpusat')->name('perkembangan.pemerintahdesadankelurahan.pembinaanpusat.')->group(function () {
    Route::get('/', [PembinaanpusatController::class, 'index'])->name('index');
    Route::get('/create', [PembinaanpusatController::class, 'create'])->name('create');
    Route::post('/', [PembinaanpusatController::class, 'store'])->name('store');
    Route::get('/{pembinaanpusat}', [PembinaanpusatController::class, 'show'])->name('show');
    Route::get('/{pembinaanpusat}/edit', [PembinaanpusatController::class, 'edit'])->name('edit');
    Route::put('/{pembinaanpusat}', [PembinaanpusatController::class, 'update'])->name('update');
    Route::delete('/{pembinaanpusat}', [PembinaanpusatController::class, 'destroy'])->name('destroy');
});

// pembinaanprovinsi Routes
Route::middleware(['auth'])->prefix('perkembangan/pemerintahdesadankelurahan/pembinaanprovinsi')->name('perkembangan.pemerintahdesadankelurahan.pembinaanprovinsi.')->group(function () {
    Route::get('/', [PembinaanprovinsiController::class, 'index'])->name('index');
    Route::get('/create', [PembinaanprovinsiController::class, 'create'])->name('create');
    Route::post('/', [PembinaanprovinsiController::class, 'store'])->name('store');
    Route::get('/{pembinaanprovinsi}', [PembinaanprovinsiController::class, 'show'])->name('show');
    Route::get('/{pembinaanprovinsi}/edit', [PembinaanprovinsiController::class, 'edit'])->name('edit');
    Route::put('/{pembinaanprovinsi}', [PembinaanprovinsiController::class, 'update'])->name('update');
    Route::delete('/{pembinaanprovinsi}', [PembinaanprovinsiController::class, 'destroy'])->name('destroy');
});

// pembinaankabupaten Routes
Route::middleware(['auth'])->prefix('perkembangan/pemerintahdesadankelurahan/pembinaankabupaten')->name('perkembangan.pemerintahdesadankelurahan.pembinaankabupaten.')->group(function () {
    Route::get('/', [PembinaankabupatenController::class, 'index'])->name('index');
    Route::get('/create', [PembinaankabupatenController::class, 'create'])->name('create');
    Route::post('/', [PembinaankabupatenController::class, 'store'])->name('store');
    Route::get('/{pembinaankabupaten}', [PembinaankabupatenController::class, 'show'])->name('show');
    Route::get('/{pembinaankabupaten}/edit', [PembinaankabupatenController::class, 'edit'])->name('edit');
    Route::put('/{pembinaankabupaten}', [PembinaankabupatenController::class, 'update'])->name('update');
    Route::delete('/{pembinaankabupaten}', [PembinaankabupatenController::class, 'destroy'])->name('destroy');
});

//pembinaankecamatan Routes
Route::middleware(['auth'])->prefix('perkembangan/pemerintahdesadankelurahan/pembinaankecamatan')->name('perkembangan.pemerintahdesadankelurahan.pembinaankecamatan.')->group(function () {
    Route::get('/', [PembinaankecamatanController::class, 'index'])->name('index');
    Route::get('/create', [PembinaankecamatanController::class, 'create'])->name('create');
    Route::post('/', [PembinaankecamatanController::class, 'store'])->name('store');
    Route::get('/{pembinaankecamatan}', [PembinaankecamatanController::class, 'show'])->name('show');
    Route::get('/{pembinaankecamatan}/edit', [PembinaankecamatanController::class, 'edit'])->name('edit');
    Route::put('/{pembinaankecamatan}', [PembinaankecamatanController::class, 'update'])->name('update');
    Route::delete('/{pembinaankecamatan}', [PembinaankecamatanController::class, 'destroy'])->name('destroy');
});
//organisasi routes

Route::middleware(['auth'])->prefix('perkembangan/lembagakemasyarakatan/organisasi')->name('perkembangan.lembagakemasyarakatan.organisasi.')->group(function () {
    Route::get('/', [OrganisasiController::class, 'index'])->name('index');
    Route::get('/create', [OrganisasiController::class, 'create'])->name('create');
    Route::post('/', [OrganisasiController::class, 'store'])->name('store');
    Route::get('/{id}', [OrganisasiController::class, 'show'])->name('show');
    Route::get('/{id}/edit', [OrganisasiController::class, 'edit'])->name('edit');
    Route::put('/{id}', [OrganisasiController::class, 'update'])->name('update');
    Route::delete('/{id}', [OrganisasiController::class, 'destroy'])->name('destroy');
});

// Peran Masyarakat routes
Route::middleware(['auth'])->prefix('perkembangan/peransertamasyarakat/musrenbangdesa')->name('perkembangan.peransertamasyarakat.musrenbangdesa.')->group(function () {
    Route::get('/', [MusrenbangdesaController::class, 'index'])->name('index');
    Route::get('/create', [MusrenbangdesaController::class, 'create'])->name('create');
    Route::post('/', [MusrenbangdesaController::class, 'store'])->name('store');
    Route::get('/{id}', [MusrenbangdesaController::class, 'show'])->name('show');
    Route::get('/{id}/edit', [MusrenbangdesaController::class, 'edit'])->name('edit');
    Route::put('/{id}', [MusrenbangdesaController::class, 'update'])->name('update');
    Route::delete('/{id}', [MusrenbangdesaController::class, 'destroy'])->name('destroy');
});




// Desa routes
Route::resource('desa', DesaController::class);

// Perangkat Desa routes
Route::middleware(['auth', 'permission:perangkat_desa.view'])->prefix('perangkat_desa')->group(function () {
    Route::get('/', action: [PerangkatDesaController::class, 'index'])->name('perangkat_desa.index');
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

// Grup menu UTAMA (BARU DENGAN PERMISSION)
Route::prefix('utama')->name('utama.')->middleware(['auth'])->group(function () {

    // Route untuk Berita dengan permission
    Route::prefix('berita')->name('berita.')->group(function () {
        Route::get('/', [BeritaController::class, 'index'])->middleware('permission:berita.view')->name('index');
        Route::get('/create', [BeritaController::class, 'create'])->middleware('permission:berita.create')->name('create');
        Route::post('/', [BeritaController::class, 'store'])->middleware('permission:berita.create')->name('store');
        Route::get('/{berita}', [BeritaController::class, 'show'])->middleware('permission:berita.view')->name('show');
        Route::get('/{berita}/edit', [BeritaController::class, 'edit'])->middleware('permission:berita.update')->name('edit');
        Route::put('/{berita}', [BeritaController::class, 'update'])->middleware('permission:berita.update')->name('update');
        Route::delete('/{berita}', [BeritaController::class, 'destroy'])->middleware('permission:berita.delete')->name('destroy');
    });

    Route::prefix('agenda')->name('agenda.')->group(function () {
        Route::get('/', [AgendaController::class, 'index'])->middleware('permission:agenda.view')->name('index');
        Route::get('/cetak', [AgendaController::class, 'cetak'])->middleware('permission:agenda.view')->name('cetak');
        Route::get('/create', [AgendaController::class, 'create'])->middleware('permission:agenda.create')->name('create');
        Route::post('/', [AgendaController::class, 'store'])->middleware('permission:agenda.create')->name('store');
        // Catatan: Rute 'show' ditambahkan jika Anda membutuhkannya di masa depan, sesuai standar resource.
        Route::get('/{agenda}', [AgendaController::class, 'show'])->middleware('permission:agenda.view')->name('show');
        Route::get('/{agenda}/edit', [AgendaController::class, 'edit'])->middleware('permission:agenda.update')->name('edit');
        Route::put('/{agenda}', [AgendaController::class, 'update'])->middleware('permission:agenda.update')->name('update');
        Route::delete('/{agenda}', [AgendaController::class, 'destroy'])->middleware('permission:agenda.delete')->name('destroy');
    });

    // Route::resource('glosarium', GlosariumController::class);
    // Route untuk Glosarium dengan permission
    // Route untuk Glosarium dengan permission
    Route::prefix('glosarium')->name('glosarium.')->group(function () {
        Route::get('/', [GlosariumController::class, 'index'])->middleware('permission:glosarium.view')->name('index');
        Route::get('/cetak', [GlosariumController::class, 'cetak'])->middleware('permission:glosarium.view')->name('cetak');
        Route::post('/', [GlosariumController::class, 'store'])->middleware('permission:glosarium.create')->name('store');
        Route::put('/{glosarium}', [GlosariumController::class, 'update'])->middleware('permission:glosarium.update')->name('update');
        Route::delete('/{glosarium}', [GlosariumController::class, 'destroy'])->middleware('permission:glosarium.delete')->name('destroy');
    });

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

// Mutasi Routes FINAL
Route::prefix('mutasi')->name('mutasi.')->middleware(['auth'])->group(function () {
    Route::get('/', [MutasiController::class, 'index'])->name('index');
    Route::get('/create', [MutasiController::class, 'create'])->name('create');
    Route::post('/', [MutasiController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [MutasiController::class, 'edit'])->name('edit');
    Route::put('/{id}', [MutasiController::class, 'update'])->name('update');
    Route::delete('/{id}', [MutasiController::class, 'destroy'])->name('destroy');
    Route::get('/{id}/show', [MutasiController::class, 'show'])->name('show');
    // Mutasi Data Routes
    // Route::get('/data', [MutasiController::class, 'indexData'])->name('data.index');
    // Route::get('/data/create', [MutasiController::class, 'createData'])->name('data.create');
    // Route::post('/data', [MutasiController::class, 'storeData'])->name('data.store');
    // Route::get('/data/{id}/edit', [MutasiController::class, 'editData'])->name('data.edit');
    // Route::put('/data/{id}', [MutasiController::class, 'updateData'])->name('data.update');
    // Route::delete('/data/{id}', [MutasiController::class, 'destroyData'])->name('data.destroy');
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

        // Jenis Surat Routes
        Route::get('jenis-surats', [JenisSuratController::class, 'index'])->name('jenis_surats.index');
        Route::get('jenis-surats/create', [JenisSuratController::class, 'create'])->name('jenis_surats.create');
        Route::post('jenis-surats', [JenisSuratController::class, 'store'])->name('jenis_surats.store');
        Route::get('jenis-surats/{id}/edit', [JenisSuratController::class, 'edit'])->name('jenis_surats.edit');
        Route::put('jenis-surats/{id}', [JenisSuratController::class, 'update'])->name('jenis_surats.update');
        Route::delete('jenis-surats/{id}', [JenisSuratController::class, 'destroy'])->name('jenis_surats.destroy');

        //
        Route::get('/', [TtdController::class, 'index'])->name('ttd.index');
    });
    // PERMOHONAN SURAT
    Route::prefix('permohonan')->group(function () {
        Route::get('/', [PermohonanSuratController::class, 'index'])->name('permohonan.index');
        Route::get('create', [PermohonanSuratController::class, 'create'])->name('permohonan.create');
        Route::post('/', [PermohonanSuratController::class, 'store'])->name('permohonan.store');
        Route::get('{id}/edit', [PermohonanSuratController::class, 'edit'])->name('permohonan.edit');
        Route::put('{id}', [PermohonanSuratController::class, 'update'])->name('permohonan.update');
        Route::delete('{id}', [PermohonanSuratController::class, 'destroy'])->name('permohonan.destroy');
        Route::get('{id}/cetak', [PermohonanSuratController::class, 'cetak'])->name('permohonan.cetak');
        Route::get('permohonan/create/masuk-domisili/{anggotaKeluargaId}', [PermohonanSuratController::class, 'createMasukDomisili'])
            ->name('permohonan.create_masuk_domisili');
    });
    // PERMOHONAN SURAT/MASUK kk
    Route::get('permohonan/masuk-kk', [PermohonanMasukController::class, 'createNewKKForm'])->name('permohonan.masuk_kk.create');
    Route::get('permohonan/masuk-kk/create-existing-kk', [PermohonanMasukController::class, 'createExistingKK'])->name('permohonan.masuk_kk.create_existing_kk');
    Route::post('permohonan/masuk-kk/store-new-kk', [PermohonanMasukController::class, 'storeNewKK'])->name('permohonan.masuk_kk.store_new_kk'); 
   Route::post('permohonan/masuk-kk/store-existing-kk', [PermohonanMasukController::class, 'storeExistingKK'])->name('permohonan.masuk_kk.store_existing_kk');
   
    Route::get('laporan/surat', [LaporanSuratController::class, 'index'])->name('laporan-surat.index');

    Route::get('laporan/surat/{id}', [LaporanSuratController::class, 'show'])->name('laporan-surat.show');
});

// ==== PERMOHONAN SURAT ====


// FORMS PERMOHONAN SURAT
// new end point to get form
Route::get('layanan/permohonan/get-form/{jenisSuratId}', [PermohonanSuratController::class, 'getForm'])
    ->name('layanan.permohonan.getForm');

// ==== PROFIL DESA ====
Route::get('profil-desa', [LayananSuratController::class, 'profilDesa'])->name('layanan.profil_desa.index');
Route::get('profil-desa/show', [LayananSuratController::class, 'showProfilDesa'])->name('layanan.profil_desa.show');
Route::get('profil-desa/edit', [LayananSuratController::class, 'editProfilDesa'])->name('layanan.profil_desa.edit');
// ==== DATA LAPORAN (submenu baru) ====
// Laporan Surat
Route::get('laporan/surat', [LayananSuratController::class, 'indexSurat'])->name('layanan.laporan.surat.index');
Route::get('laporan/surat/{id}', [LayananSuratController::class, 'showSurat'])->name('layanan.laporan.surat.show');
Route::get('laporan/surat/{id}/cetak', [LayananSuratController::class, 'cetakSurat'])->name('layanan.laporan.surat.cetak');
Route::middleware(['auth', 'permission:usia.view'])->prefix('potensi/potensi-sdm/usia')->name('potensi.potensi-sdm.usia.')->group(function () {
    Route::get('/', [UsiaController::class, 'index'])->name('index');
    Route::get('/create', [UsiaController::class, 'create'])->middleware('permission:usia.create')->name('create');
    Route::post('/', [UsiaController::class, 'store'])->middleware('permission:usia.store')->name('store');
    Route::get('/{usia}', [UsiaController::class, 'show'])->name('show');
    Route::get('/{usia}/edit', [UsiaController::class, 'edit'])->middleware('permission:usia.update')->name('edit');
    Route::put('/{usia}', [UsiaController::class, 'update'])->middleware('permission:usia.update')->name('update');
    Route::delete('/{usia}', [UsiaController::class, 'destroy'])->middleware('permission:usia.delete')->name('destroy');
});

// perkembangan_penduduk routes
Route::get('perkembangan-penduduk', [PerkembanganPendudukController::class, 'index'])->name('perkembangan-penduduk.index');
Route::get('perkembangan-penduduk/create', [PerkembanganPendudukController::class, 'create'])->name('perkembangan-penduduk.create');
Route::post('perkembangan-penduduk', [PerkembanganPendudukController::class, 'store'])->name('perkembangan-penduduk.store');
Route::resource('perkembangan-penduduk', PerkembanganPendudukController::class);


// perkembangan penduduk crud update, delete
Route::get('perkembangan-penduduk/{id}/edit', [PerkembanganPendudukController::class, 'edit'])->name('perkembangan-penduduk.edit');
Route::put('perkembangan-penduduk/{id}', [PerkembanganPendudukController::class, 'update'])->name('perkembangan-penduduk.update');
Route::delete('perkembangan-penduduk/{id}', [PerkembanganPendudukController::class, 'destroy'])->name('perkembangan-penduduk.destroy');


// produk domestik desa

Route::prefix('perkembangan/produk-domestik')->name('perkembangan.produk-domestik.')->group(function () {
    Route::resource('sektor-pertambangan', SektorPertambanganController::class);

    // Subsektor Kerajinan routes

    Route::resource('subsektor-kerajinan', SubsektorKerajinanController::class);
});


// ==== PERMOHONAN SURAT ====

// new
Route::get('/permohonan', [PermohonanSuratController::class, 'index'])->name('layanan.permohonan.index');
Route::get('/permohonan/create', [PermohonanSuratController::class, 'create'])
    ->name('layanan.permohonan.create');
Route::post('permohonan', [PermohonanSuratController::class, 'store'])->name('layanan.permohonan.store');
Route::get('/permohonan/edit/{id}', [PermohonanSuratController::class, 'edit'])->name('layanan.permohonan.edit');
Route::put('/permohonan/update/{id}', [PermohonanSuratController::class, 'update'])->name('layanan.permohonan.update');
Route::delete('/permohonan/destroy/{id}', [PermohonanSuratController::class, 'destroy'])->name('layanan.permohonan.destroy');

Route::get('/permohonan/cetak/{id}', [PermohonanSuratController::class, 'cetak'])->name('layanan.permohonan.cetak');
// FORMS PERMOHONAN SURAT
// // new end point to get form
// Route::get('layanan/permohonan/get-form/{jenisSuratId}', [PermohonanSuratController::class, 'getForm'])
// ->name('layanan.permohonan.getForm');




require __DIR__ . '/auth.php';

// end point for get angota keluarga by data keluarga id

Route::get('/anggota_keluarga/{id}/get_data', [AnggotaKeluargaController::class, 'get_data'])->name('anggota_keluarga.get_data');
// routes for direct file (placeholder routes)
Route::get('/master-ddk/{table?}', [MasterDDKController::class, 'index'])->name('master.ddk.index');
Route::get('/master-ddk/{table?}', [MasterDDKController::class, 'index'])->name('master.ddk.index');
Route::get('/master-ddk/{table}/create', [MasterDdkController::class, 'create'])->name('master.ddk.create');
Route::post('/master-ddk/{table}', [MasterDdkController::class, 'store'])->name('master.ddk.store');
Route::get('/master-ddk/{table}/{id}/edit', [MasterDdkController::class, 'edit'])->name('master.ddk.edit');
Route::put('/master-ddk/{table}/{id}', [MasterDdkController::class, 'update'])->name('master.ddk.update');
Route::delete('/master-ddk/{table}/{id}', [MasterDdkController::class, 'destroy'])->name('master.ddk.destroy');

Route::prefix('master-perkembangan')->name('master-perkembangan.')->group(function () {
    Route::get('/', [MasterPerkembanganController::class, 'index'])->name('index');
    Route::post('/store', [MasterPerkembanganController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [MasterPerkembanganController::class, 'edit'])->name('edit');
    Route::put('/update/{id}', [MasterPerkembanganController::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [MasterPerkembanganController::class, 'destroy'])->name('destroy');
});

Route::prefix('master-potensi')->name('master-potensi.')->group(function () {
    Route::get('/', [MasterPotensiController::class, 'index'])->name('index');
    Route::post('/store', [MasterPotensiController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [MasterPotensiController::class, 'edit'])->name('edit');
    Route::put('/{id}', [MasterPotensiController::class, 'update'])->name('update'); // URL jadi /master-potensi/{id}
    Route::delete('/{id}', [MasterPotensiController::class, 'destroy'])->name('destroy'); // URL jadi /master-potensi/{id}
    // Route::delete('/delete/{id}', [MasterPotensiController::class, 'destroy'])->name('destroy');
});

// ==== POTENSI KELEMBAGAAN ==== //
Route::prefix('potensi/potensi-kelembagaan')->name('potensi.potensi-kelembagaan.')->middleware(['auth'])->group(function () {
    Route::get('pemerintah', [PotensiKelembagaanController::class, 'index'])->name('pemerintah.index')->middleware('permission:potensi.kelembagaan.pemerintah.view');
    Route::get('pemerintah/create', [PotensiKelembagaanController::class, 'create'])->name('pemerintah.create')->middleware('permission:potensi.kelembagaan.pemerintah.create');
    Route::post('pemerintah', [PotensiKelembagaanController::class, 'store'])->name('pemerintah.store')->middleware('permission:potensi.kelembagaan.pemerintah.store');
    Route::get('pemerintah/{id}', [PotensiKelembagaanController::class, 'show'])->name('pemerintah.show')->middleware('permission:potensi.kelembagaan.pemerintah.view');
    Route::get('pemerintah/{id}/edit', [PotensiKelembagaanController::class, 'edit'])->name('pemerintah.edit')->middleware('permission:potensi.kelembagaan.pemerintah.edit');
    Route::put('pemerintah/{id}', [PotensiKelembagaanController::class, 'update'])->name('pemerintah.update')->middleware('permission:potensi.kelembagaan.pemerintah.update');
    Route::delete('pemerintah/{id}', [PotensiKelembagaanController::class, 'destroy'])->name('pemerintah.destroy')->middleware('permission:potensi.kelembagaan.pemerintah.destroy');
    Route::get('pemerintah/{id}/print', [PotensiKelembagaanController::class, 'print'])->name('print');
    Route::get('pemerintah/{id}/download', [PotensiKelembagaanController::class, 'download'])->name('download');
    });
// ==== POTENSI LEMBAGA POLITIK ==== //
Route::prefix('potensi/potensi-kelembagaan/politik')->name('potensi.potensi-kelembagaan.politik.')->group(function () {
    Route::get('/', [PolitikController::class, 'index'])->name('index');
    Route::get('/create', [PolitikController::class, 'create'])->name('create');
    Route::post('/store', [PolitikController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [PolitikController::class, 'edit'])->name('edit');
    Route::put('/update/{id}', [PolitikController::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [PolitikController::class, 'destroy'])->name('destroy');
    Route::get('/show/{id}', [PolitikController::class, 'show'])->name('show');
    Route::get('/{id}/print', [PolitikController::class, 'print'])->name('print');
    Route::get('/{id}/download', [PolitikController::class, 'download'])->name('download');
});

 // ==== POTENSI LEMBAGA EKONOMI ==== //
 Route::prefix('potensi/potensi-kelembagaan')->name('potensi.potensi-kelembagaan.')->middleware(['auth'])->group(function () {
    Route::get('ekonomi', [EkonomiController::class, 'index'])->name('ekonomi.index'); // tampil data
    Route::get('ekonomi/create', [EkonomiController::class, 'create'])->name('ekonomi.create'); // form tambah
    Route::post('ekonomi', [EkonomiController::class, 'store'])->name('ekonomi.store'); // simpan data baru
    Route::get('ekonomi/{id}', [EkonomiController::class, 'show'])->name('ekonomi.show'); // detail data
    Route::get('ekonomi/{id}/edit', [EkonomiController::class, 'edit'])->name('ekonomi.edit'); // form edit
    Route::put('ekonomi/{id}', [EkonomiController::class, 'update'])->name('ekonomi.update'); // update data
    Route::delete('ekonomi/{id}', [EkonomiController::class, 'destroy'])->name('ekonomi.destroy'); // hapus data
    Route::get('ekonomi/{id}/print', [EkonomiController::class, 'print'])->name('print');
    Route::get('ekonomi/{id}/download', [EkonomiController::class, 'download'])->name('download');
    Route::get('ekonomi/jenis/{kategoriId}', [EkonomiController::class, 'getJenis'])
            ->name('ekonomi.getJenis');
});

 // ==== POTENSI LEMBAGA HIBURAN ==== //
Route::prefix('potensi/potensi-kelembagaan/hiburan')->name('potensi.potensi-kelembagaan.hiburan.')->group(function () {
    Route::get('/', [HiburanController::class, 'index'])->name('index');
    Route::get('/create', [HiburanController::class, 'create'])->name('create');
    Route::post('/', [HiburanController::class, 'store'])->name('store');
    Route::get('/{id}', [HiburanController::class, 'show'])->name('show');
    Route::get('/{id}/edit', [HiburanController::class, 'edit'])->name('edit');
    Route::put('/{id}', [HiburanController::class, 'update'])->name('update');
    Route::delete('/{id}', [HiburanController::class, 'destroy'])->name('destroy');
    Route::get('/{id}/print', [HiburanController::class, 'print'])->name('print');
    Route::get('/{id}/download', [HiburanController::class, 'download'])->name('download');
    Route::get('/getJenis/{kategoriId}', [HiburanController::class, 'getJenis'])->name('getJenis');
});
 // ==== POTENSI LEMBAGA ADAT ==== //
Route::middleware(['auth'])->prefix('potensi/potensi-kelembagaan/lembagaAdat')->name('potensi.potensi-kelembagaan.lembagaAdat.')->group(function () {
    Route::get('/', [LembagaAdatController::class, 'index'])->middleware('permission:adat.view')->name('index');
    Route::get('/create', [LembagaAdatController::class, 'create'])->middleware('permission:adat.create')->name('create');
    Route::post('/', [LembagaAdatController::class, 'store'])->middleware('permission:adat.store')->name('store');
    Route::get('/{adat}', [LembagaAdatController::class, 'show'])->middleware('permission:adat.view')->name('show');
    Route::get('/{adat}/edit', [LembagaAdatController::class, 'edit'])->middleware('permission:adat.update')->name('edit');
    Route::put('/{adat}', [LembagaAdatController::class, 'update'])->middleware('permission:adat.update')->name('update');
    Route::delete('/{adat}', [LembagaAdatController::class, 'destroy'])->middleware('permission:adat.delete')->name('destroy');
    Route::get('/{id}/print', [LembagaAdatController::class, 'print'])->name('print');
    Route::get('/{id}/download', [LembagaAdatController::class, 'download'])->name('download');
});

 // ==== POTENSI LEMBAGA KEMASYARAKATAN ==== //
Route::middleware(['auth'])->prefix('potensi/potensi-kelembagaan/lembaga-kemasyarakatan')->name('potensi.potensi-kelembagaan.lembaga-kemasyarakatan.')->group(function () {
    Route::get('/', [LembagaKemasyarakatanController::class, 'index'])->middleware('permission:lembaga-kemasyarakatan.view')->name('index');
    Route::get('/create', [LembagaKemasyarakatanController::class, 'create'])->middleware('permission:lembaga-kemasyarakatan.create')->name('create');
    Route::post('/', [LembagaKemasyarakatanController::class, 'store'])->middleware('permission:lembaga-kemasyarakatan.store')->name('store');
    Route::get('/{id}', [LembagaKemasyarakatanController::class, 'show'])->middleware('permission:lembaga-kemasyarakatan.show')->name('show');
    Route::get('/{id}/edit', [LembagaKemasyarakatanController::class, 'edit'])->middleware('permission:lembaga-kemasyarakatan.edit')->name('edit');
    Route::put('/{id}', [LembagaKemasyarakatanController::class, 'update'])->middleware('permission:lembaga-kemasyarakatan.update')->name('update');
    Route::delete('/{id}', [LembagaKemasyarakatanController::class, 'destroy'])->middleware('permission:lembaga-kemasyarakatan.destroy')->name('destroy');
    Route::get('/{id}/print', [LembagaKemasyarakatanController::class, 'print'])->middleware('permission:lembaga-kemasyarakatan.print')->name('print');
    Route::get('/{id}/download', [LembagaKemasyarakatanController::class, 'download'])->name('download');
});
 // ==== POTENSI LEMBAGA PENDIDIKAN ==== //
Route::prefix('potensi/potensi-kelembagaan/pendidikan')->name('potensi.potensi-kelembagaan.pendidikan.')->group(function () {
    Route::get('/', [PendidikanController::class, 'index'])->name('index');
    Route::get('/create', [PendidikanController::class, 'create'])->name('create');
    Route::post('/', [PendidikanController::class, 'store'])->name('store');
    Route::get('/{id}', [PendidikanController::class, 'show'])->name('show');
    Route::get('/{id}/edit', [PendidikanController::class, 'edit'])->name('edit');
    Route::put('/{id}', [PendidikanController::class, 'update'])->name('update');
    Route::delete('/{id}', [PendidikanController::class, 'destroy'])->name('destroy');
    Route::get('/getJenis/{kategoriId}', [PendidikanController::class, 'getJenis'])->name('getJenis');
    Route::get('/{id}/print', [PendidikanController::class, 'print'])->name('print');
    Route::get('/{id}/download', [PendidikanController::class, 'download'])->name('download');
});
// ==== POTENSI LEMBAGA KEAMANAN ==== //
Route::prefix('potensi/potensi-kelembagaan/keamanan')->name('potensi.potensi-kelembagaan.keamanan.')->group(function () {
    Route::get('/', [LembagaKeamananController::class, 'index'])->name('index');
    Route::get('/create', [LembagaKeamananController::class, 'create'])->name('create');
    Route::post('/', [LembagaKeamananController::class, 'store'])->name('store');
    Route::get('/{id}', [LembagaKeamananController::class, 'show'])->name('show');
    Route::get('/{id}/edit', [LembagaKeamananController::class, 'edit'])->name('edit');
    Route::put('/{id}', [LembagaKeamananController::class, 'update'])->name('update');
    Route::delete('/{id}', [LembagaKeamananController::class, 'destroy'])->name('destroy');
    Route::get('/{id}/print', [LembagaKeamananController::class, 'print'])->name('print');
    Route::get('/{id}/download', [LembagaKeamananController::class, 'download'])->name('download');
});
// ==== POTENSI LEMBAGA PENGANGKUTAN ==== //
Route::prefix('potensi/potensi-kelembagaan/pengangkutan')->name('potensi.potensi-kelembagaan.pengangkutan.')->group(function () {
    Route::get('/', [JasaPengangkutanController::class, 'index'])->name('index');
    Route::get('/create', [JasaPengangkutanController::class, 'create'])->name('create');
    Route::post('/store', [JasaPengangkutanController::class, 'store'])->name('store');
    Route::get('/{id}/detail', [JasaPengangkutanController::class, 'show'])->name('show');
    Route::get('/{id}/edit', [JasaPengangkutanController::class, 'edit'])->name('edit');
    Route::put('/{id}/update', [JasaPengangkutanController::class, 'update'])->name('update');
    Route::delete('/{id}/delete', [JasaPengangkutanController::class, 'destroy'])->name('destroy');
    Route::get('/{id}/print', [JasaPengangkutanController::class, 'print'])->name('print');
    Route::get('/{id}/print', [JasaPengangkutanController::class, 'print'])->name('print');
    Route::get('/{id}/download', [JasaPengangkutanController::class, 'download'])->name('download');
});

// ==== Route jenis Surat ====
Route::prefix('layanan/permohonan')->group(function () {
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
Route::get('/cetak/sk_domisili', function () {
    return view('pages.layanan.permohonan.cetak.sk_domisili');
});
Route::get('/cetak/sp_berlakuan_baik', function () {
    return view('pages.layanan.permohonan.cetak.sp_berlakuan_baik');
});
Route::get('/cetak/sk_tidak_mampu', function () {
    return view('pages.layanan.permohonan.cetak.sk_tidak_mampu');
});
Route::get('/cetak/sk_belum_pernah_nikah', function () {
    return view('pages.layanan.permohonan.cetak.sk_belum_pernah_nikah');
});
Route::get('/cetak/sk_kehilangan_ktp', function () {
    return view('pages.layanan.permohonan.cetak.sk_kehilangan_ktp');
});
Route::get('/cetak/sk_umum', function () {
    return view('pages.layanan.permohonan.cetak.sk_umum');
});
Route::get('/cetak/sr_ijin_mendirikan_bangunan', function () {
    return view('pages.layanan.permohonan.cetak.sr_ijin_mendirikan_bangunan');
});
Route::get('/cetak/sr_ijin_tempat', function () {
    return view('pages.layanan.permohonan.cetak.sr_ijin_tempat');
});
Route::get('/cetak/surat_penghibaan_tanah', function () {
    return view('pages.layanan.permohonan.surat_penghibaan_tanah');
});
Route::get('/cetak/surat_rekomendasi_rt', function () {
    return view('pages.layanan.permohonan.surat_rekomendasi_rt');
});
// Route::prefix('layanan/permohonan')->group(function () {
//     Route::view('/sk_domisili', 'pages.layanan.permohonan.forms.sk_domisili')->name('permohonan.sk_domisili');
//     Route::view('/sk_belum_pernah_nikah', 'pages.layanan.permohonan.forms.sk_belum_pernah_nikah')->name('permohonan.sk_belum_pernah_nikah');
//     Route::view('/sp_berlakuan_baik', 'pages.layanan.permohonan.forms.sp_berlakuan_baik')->name('permohonan.sp_berlakuan_baik');
//     Route::view('/sk_tidak_mampu', 'pages.layanan.permohonan.forms.sk_tidak_mampu')->name('permohonan.sk_tidak_mampu');
//     Route::view('/sk_kehilangan_ktp', 'pages.layanan.permohonan.forms.sk_kehilangan_ktp')->name('permohonan.sk_kehilangan_ktp');
//     Route::view('/surat_penghibaan_tanah', 'pages.layanan.permohonan.forms.surat_penghibaan_tanah')->name('permohonan.surat_penghibaan_tanah');
//     Route::view('/sk_umum', 'pages.layanan.permohonan.forms.sk_umum')->name('permohonan.sk_umum');
//     Route::view('/surat_rekomendasi_rt', 'pages.layanan.permohonan.forms.surat_rekomendasi_rt')->name('permohonan.surat_rekomendasi_rt');
//     Route::view('/sr_ijin_mendirikan_bangunan', 'pages.layanan.permohonan.forms.sr_ijin_mendirikan_bangunan')->name('permohonan.sr_ijin_mendirikan_bangunan');
//     Route::view('/sr_ijin_tempat', 'pages.layanan.permohonan.forms.sr_ijin_tempat')->name('permohonan.sr_ijin_tempat');
// });
// Route::get('/cetak/sk_domisili', function () {
//     return view('pages.layanan.permohonan.cetak.sk_domisili');
// });
// Route::get('/cetak/sp_berlakuan_baik', function () {
//     return view('pages.layanan.permohonan.cetak.sp_berlakuan_baik');
// });
// Route::get('/cetak/sk_tidak_mampu', function () {
//     return view('pages.layanan.permohonan.cetak.sk_tidak_mampu');
// });
// Route::get('/cetak/sk_belum_pernah_nikah', function () {
//     return view('pages.layanan.permohonan.cetak.sk_belum_pernah_nikah');
// });
// Route::get('/cetak/sk_kehilangan_ktp', function () {
//     return view('pages.layanan.permohonan.cetak.sk_kehilangan_ktp');
// });
// Route::get('/cetak/sk_umum', function () {
//     return view('pages.layanan.permohonan.cetak.sk_umum');
// });
// Route::get('/cetak/sr_ijin_mendirikan_bangunan', function () {
//     return view('pages.layanan.permohonan.cetak.sr_ijin_mendirikan_bangunan');
// });
// Route::get('/cetak/sr_ijin_tempat', function () {
//     return view('pages.layanan.permohonan.cetak.sr_ijin_tempat');
// });
// Route::get('/cetak/surat_penghibaan_tanah', function () {
//     return view('pages.layanan.permohonan.surat_penghibaan_tanah');
// });
// Route::get('/cetak/surat_rekomendasi_rt', function () {
//     return view('pages.layanan.permohonan.surat_rekomendasi_rt');
// });
