<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\PerangkatDesaController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DesaController;
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
    Route::prefix('notifications')->name('notifications.')->group(function () {
        Route::post('/mark-as-read', [NotificationController::class, 'markAsRead'])->name('mark-as-read');
        Route::post('/mark-all-as-read', [NotificationController::class, 'markAllAsRead'])->name('mark-all-as-read');
        Route::get('/count', [NotificationController::class, 'getCount'])->name('count');
    });
});

// Categories routes
Route::middleware(['auth', 'permission:category.view'])->group(function () {
    Route::get('/kategori', [CategoryController::class, 'index'])->name('category.index');
    Route::post('/kategori', [CategoryController::class, 'store'])->middleware('permission:category.store')->name('category.store');
    Route::put('/kategori/{id}', [CategoryController::class, 'update'])->middleware('permission:category.update')->name('category.update');
    Route::delete('/kategori/{id}', [CategoryController::class, 'destroy'])->middleware('permission:category.delete')->name('category.destroy');
});

// Suppliers routes
Route::middleware(['auth', 'permission:supplier.view'])->group(function () {
    Route::get('/supplier', [SupplierController::class, 'index'])->name('supplier.index');
    Route::post('/supplier', [SupplierController::class, 'store'])->middleware('permission:supplier.store')->name('supplier.store');
    Route::put('/supplier/{id}', [SupplierController::class, 'update'])->middleware('permission:supplier.update')->name('supplier.update');
    Route::delete('/supplier/{id}', [SupplierController::class, 'destroy'])->middleware('permission:supplier.delete')->name('supplier.destroy');
});

// Units routes
Route::middleware(['auth', 'permission:unit.view'])->group(function () {
    Route::get('/satuan', [UnitController::class, 'index'])->name('unit.index');
    Route::post('/satuan', [UnitController::class, 'store'])->middleware('permission:unit.store')->name('unit.store');
    Route::put('/satuan/{id}', [UnitController::class, 'update'])->middleware('permission:unit.update')->name('unit.update');
    Route::delete('/satuan/{id}', [UnitController::class, 'destroy'])->middleware('permission:unit.delete')->name('unit.destroy');
});

Route::prefix('konsumen')->group(function () {
    Route::middleware('permission:customer.view')->get('/', [CustomerController::class, 'index'])->name('customer.index');
    Route::middleware('permission:customer.store')->post('/', [CustomerController::class, 'store'])->name('customer.store');
    Route::middleware('permission:customer.update')->put('/{customer}', [CustomerController::class, 'update'])->name('customer.update');
    Route::middleware('permission:customer.delete')->delete('/{customer}', [CustomerController::class, 'destroy'])->name('customer.destroy');
});

// Products routes
Route::middleware(['auth', 'permission:product.view'])->group(function () {
    Route::get('/produk', [ProductController::class, 'index'])->name('product.index');
    Route::get('/produk/create', [ProductController::class, 'create'])->middleware('permission:product.create')->name('product.create');
    Route::post('/produk', [ProductController::class, 'store'])->middleware('permission:product.store')->name('product.store');
    Route::get('/produk/{id}', [ProductController::class, 'show'])->name('product.show');
    Route::get('/produk/{id}/edit', [ProductController::class, 'edit'])->middleware('permission:product.edit')->name('product.edit');
    Route::put('/produk/{id}', [ProductController::class, 'update'])->middleware('permission:product.update')->name('product.update');
    Route::delete('/produk/{id}', [ProductController::class, 'destroy'])->middleware('permission:product.delete')->name('product.destroy');
});

// Stock Management routes
Route::middleware(['auth', 'permission:stock.view'])->prefix('stok')->group(function () {
    Route::get('/', [StockController::class, 'index'])->name('stock.index');
    Route::get('/riwayat', [StockController::class, 'movements'])->name('stock.movements');

    // Stock In
    Route::get('/masuk', [StockController::class, 'stockInForm'])->middleware('permission:stock.in')->name('stock.in.form');
    Route::post('/masuk', [StockController::class, 'stockIn'])->middleware('permission:stock.in')->name('stock.in');

    // Stock Out
    Route::get('/keluar', [StockController::class, 'stockOutForm'])->middleware('permission:stock.out')->name('stock.out.form');
    Route::post('/keluar', [StockController::class, 'stockOut'])->middleware('permission:stock.out')->name('stock.out');

    // Stock Adjustment
    Route::get('/penyesuaian', [StockController::class, 'adjustmentForm'])->middleware('permission:stock.adjustment')->name('stock.adjustment.form');
    Route::post('/penyesuaian', [StockController::class, 'adjustment'])->middleware('permission:stock.adjustment')->name('stock.adjustment');
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

// Sales routes
Route::middleware(['auth'])->prefix('penjualan')->group(function () {
    Route::get('/', [SalesController::class, 'index'])->name('sales.pos');
    Route::get('/riwayat', [SalesController::class, 'history'])->name('sales.history');
    Route::get('/{id}', [SalesController::class, 'show'])->name('sales.show');
    Route::get('/{id}/struk', [SalesController::class, 'receipt'])->name('sales.receipt');
    Route::get('/{id}/cetak', [SalesController::class, 'printReceipt'])->name('sales.print');
    Route::post('/{id}/batal', [SalesController::class, 'cancel'])->name('sales.cancel');

    // Cart API routes
    Route::prefix('keranjang')->group(function () {
        Route::post('/tambah', [SalesController::class, 'addToCart'])->name('sales.cart.add');
        Route::put('/update', [SalesController::class, 'updateCart'])->name('sales.cart.update');
        Route::delete('/hapus', [SalesController::class, 'removeFromCart'])->name('sales.cart.remove');
        Route::get('/data', [SalesController::class, 'getCart'])->name('sales.cart.get');
        Route::delete('/kosongkan', [SalesController::class, 'clearCart'])->name('sales.cart.clear');
    });

    Route::post('/checkout', [SalesController::class, 'checkout'])->name('sales.checkout');
    Route::get('/ringkasan-hari-ini', [SalesController::class, 'todaySummary'])->name('sales.today');
});

// Purchase routes
Route::middleware(['auth', 'permission:purchase.view'])->prefix('pembelian')->group(function () {
    Route::get('/', [PurchaseController::class, 'index'])->name('purchases.index');
    Route::get('/create', [PurchaseController::class, 'create'])->middleware('permission:purchase.create')->name('purchases.create');
    Route::post('/', [PurchaseController::class, 'store'])->middleware('permission:purchase.store')->name('purchases.store');
    Route::get('/{id}', [PurchaseController::class, 'show'])->middleware('permission:purchase.show')->name('purchases.show');
    Route::delete('/{id}', [PurchaseController::class, 'destroy'])->middleware('permission:purchase.delete')->name('purchases.destroy');
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