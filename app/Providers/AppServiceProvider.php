<?php
namespace App\Providers;

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
            $settings = Cache::rememberForever('general_settings', function () {
                return Settings::select('key', 'value')
                    ->whereIn('key', ['address_1', 'address_2', 'primary_phone', 'email', 'whatsapp', 'whatsapp_message', 'about_us'])
                    ->pluck('value', 'key');
            });

            $view->with(['generalSettings' => $settings]);
        });

        Schema::defaultStringLength(191);
    }
}
