<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class NotificationComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('components.alert', function ($view) {
            $user = auth()->user();
            $view->with([
                'notifications' => $user ? $user->notifications->take(5) : [],
                'unreadCount' => $user ? $user->unreadNotifications->count() : 0
            ]);
        });
    }
}
