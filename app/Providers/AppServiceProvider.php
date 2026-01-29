<?php
namespace App\Providers;

use App\Models\CenterService;
use App\Models\Menu;
use App\Models\Settings;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
    public function boot(): void
    {
        View::composer('*', function ($view) {
            $menus = Cache::rememberForever('menus', function () {
                return Menu::select('id', 'name', 'slug')
                    ->with(
                        [
                            'governmentCenters' => fn($q) =>
                            $q->select('id', 'menu_id', 'name', 'slug')
                                ->with(
                                    [
                                        'centerServices' => fn($q) =>
                                        $q->select('id', 'government_center_id', 'menu_id', 'name', 'slug')
                                            ->where('is_active', true)
                                            ->orderBy('sort_order'),
                                    ])
                                ->where('is_active', true)
                                ->orderBy('sort_order'),

                            'centerServices'    => fn($q)    =>
                            $q->select('id', 'menu_id', 'name', 'slug')->where('is_active', true)->orderBy('sort_order'),
                        ]
                    )
                    ->where('is_active', true)
                    ->orderBy('sort_order')
                    ->get();
            });

            $settings = Cache::rememberForever('general_settings', function () {
                return Settings::pluck('value', 'key');
            });

            $useful = Cache::rememberForever('useful_services', function () use ($settings) {
                return CenterService::select('id', 'name', 'slug')->whereIn('id', explode(',', $settings['useful_services']))->get();
            });

            $view->with([
                'sharedMenus'     => $menus,
                'generalSettings' => $settings,
                'usefulLinks'     => $useful,
            ]);
        });

        Schema::defaultStringLength(191);
    }
}
