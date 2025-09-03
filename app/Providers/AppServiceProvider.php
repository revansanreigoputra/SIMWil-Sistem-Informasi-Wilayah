<?php

namespace App\Providers;

use App\Repositories\CategoryRepository;
use App\Repositories\CustomerRepository;
use App\Repositories\Interface\CategoryRepositoryInterface;
use App\Repositories\Interface\CustomerRepositoryInterface;
use App\Repositories\Interface\ProductRepositoryInterface;
use App\Repositories\Interface\RoleRepositoryInterface;
use App\Repositories\Interface\SalesRepositoryInterface;
use App\Repositories\Interface\SettingRepositoryInterface;
use App\Repositories\Interface\StockMovementRepositoryInterface;
use App\Repositories\Interface\StockOpnameRepositoryInterface;
use App\Repositories\Interface\SupplierRepositoryInterface;
use App\Repositories\Interface\UnitRepositoryInterface;
use App\Repositories\Interface\UserRepositoryInterface;
use App\Repositories\ProductRepository;
use App\Repositories\RoleRepository;
use App\Repositories\SalesRepository;
use App\Repositories\SettingRepository;
use App\Repositories\StockMovementRepository;
use App\Repositories\StockOpnameRepository;
use App\Repositories\SupplierRepository;
use App\Repositories\UnitRepository;
use App\Repositories\UserRepository;
use App\Repositories\Interface\PurchaseRepositoryInterface;
use App\Repositories\PurchaseRepository;
use App\Services\CategoryService;
use App\Services\CustomerService;
use App\Services\Interface\CategoryServiceInterface;
use App\Services\Interface\CustomerServiceInterface;
use App\Services\Interface\ProductServiceInterface;
use App\Services\Interface\RoleServiceInterface;
use App\Services\Interface\NotificationServiceInterface;
use App\Services\Interface\SalesServiceInterface;
use App\Services\Interface\SettingServiceInterface;
use App\Services\Interface\StockOpnameServiceInterface;
use App\Services\Interface\StockServiceInterface;
use App\Services\Interface\SupplierServiceInterface;
use App\Services\Interface\UnitServiceInterface;
use App\Services\Interface\UserServiceInterface;
use App\Services\NotificationService;
use App\Services\ProductService;
use App\Services\RoleService;
use App\Services\SalesService;
use App\Services\SettingService;
use App\Services\StockOpnameService;
use App\Services\StockService;
use App\Services\SupplierService;
use App\Services\UnitService;
use App\Services\UserService;
use App\Services\Interface\PurchaseServiceInterface;
use App\Services\PurchaseService;
use App\View\Composers\NotificationComposer;
use App\View\Composers\SettingComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\WebsiteSetting;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $bindings = [
            RoleServiceInterface::class => RoleService::class,
            RoleRepositoryInterface::class => RoleRepository::class,
            NotificationServiceInterface::class => NotificationService::class,
            SettingServiceInterface::class => SettingService::class,
            SettingRepositoryInterface::class => SettingRepository::class,
            UserServiceInterface::class => UserService::class,
            UserRepositoryInterface::class => UserRepository::class,
        ];

        foreach ($bindings as $interface => $implementation) {
            $this->app->bind($interface, $implementation);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Register view composer for notifications
        View::composer('partials.navbar', NotificationComposer::class);

        // Register view composer for settings
        View::composer('partials.sidebar', SettingComposer::class);

        // Share websiteSetting ke semua view
        View::composer('*', SettingComposer::class);
    }
}
