<?php

namespace TaixuDayDayUp\Ssoclient;

use Illuminate\Support\ServiceProvider;

class SsoClientServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/Routes' => base_path('app/Http/Routes'),
            __DIR__.'/Controllers' => base_path('app/Http/Controllers/Admin'),
            __DIR__.'/views' => base_path('resources/views/vendor/sso'),
            __DIR__.'/config/sso.php' => config_path('sso.php'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('ssoClient', function () {
            return new SsoClient;
        });
    }
}
