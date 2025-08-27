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
    View::composer('*', function ($view) {
        $navbarMenus = Menu::whereNull('parent_id')
            ->where('status', 'active')
            ->with(['children' => function ($q) {
                $q->where('status', 'active')->orderBy('order');
            }])
            ->orderBy('order')
            ->get(); // penting: get(), bukan paginate()

        $view->with('navbarMenus', $navbarMenus); // <-- beda nama
    });
}


}
