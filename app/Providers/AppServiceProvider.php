<?php

namespace App\Providers;

use App\Repositories\Interface\RoleRepositoryInterface;
use App\Repositories\Interface\SettingRepositoryInterface;
use App\Repositories\Interface\UserRepositoryInterface;
use App\Repositories\RoleRepository;

use App\Repositories\SettingRepository;
use App\Repositories\UserRepository;
use App\Services\Interface\RoleServiceInterface;
use App\Services\Interface\NotificationServiceInterface;
use App\Services\Interface\SettingServiceInterface;
use App\Services\Interface\UserServiceInterface;
use App\Services\NotificationService;
use App\Services\RoleService;
use App\Services\SettingService;
use App\Services\UserService;
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
            // NotificationServiceInterface::class => NotificationService::class,
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
        // View::composer('partials.navbar', NotificationComposer::class);

        // Register view composer for settings
        View::composer('partials.sidebar', SettingComposer::class);

        // Share websiteSetting ke semua view
        View::composer('*', SettingComposer::class);
    }
}
