<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
//        FilamentView::registerRenderHook(
//            'panels::head.end',
//            fn (): string => Blade::render('@vite(\'resources/css/app.css\')')
//        );
//        FilamentView::registerRenderHook(
//            'panels::scripts.after',
//            fn (): string => Blade::render('@vite(\'resources/js/app.js\')')
//        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        ResetPassword::createUrlUsing(function (object $notifiable, string $token) {
            return config('app.frontend_url')."/password-reset/$token?email={$notifiable->getEmailForPasswordReset()}";
        });
        Gate::before(function (User $user, string $ability) {
            return $user->isSuperAdmin() ? true : null;
        });
        Paginator::useBootstrap();

    }
}
