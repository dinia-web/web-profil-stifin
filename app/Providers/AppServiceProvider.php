<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Menu;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        // Kirim data menu ke layout
        View::composer('layouts.menu', function ($view) {
            $menus = Menu::with('children')
                ->whereNull('parent_id')
                ->where('status', 'active')
                ->orderBy('order')
                ->get();

            $view->with('mainMenus', $menus);
        });
    }
}
