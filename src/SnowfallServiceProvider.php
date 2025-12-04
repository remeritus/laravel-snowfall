<?php

namespace Remeritus\Snowfall;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class SnowfallServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Publish config
        $this->publishes([
            __DIR__.'/../config/snowfall.php' => config_path('snowfall.php'),
        ], 'config');

        // Load views
        $this->loadViewsFrom(__DIR__.'/resources/views', 'snowfall');

        // Register Blade directive
        Blade::directive('snowfall', function () {
            return "<?php echo view('snowfall::snowfall')->render(); ?>";
        });
    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/snowfall.php', 'snowfall'
        );
    }
}