<?php

namespace Vespera\DataBinder\Support;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Vespera\DataBinder\DataBinder;

class ServiceProvider extends BaseServiceProvider
{
    public function register()
    {
        $this->app->singleton(DataBinder::class, function () {
            return new DataBinder();
        });
    }

    public function boot()
    {
        $this->setBladeDirectives();
    }

    private function setBladeDirectives(): void
    {
        Blade::directive('bind', function ($bind) {
            return "<?php app(\Vespera\LaravelComponents\DataBinder::class)->bind({$bind}); ?>";
        });

        Blade::directive('endbind', function () {
            return "<?php app(\Vespera\LaravelComponents\DataBinder::class)->pop(); ?>";
        });
    }
}
