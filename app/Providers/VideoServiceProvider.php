<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Helpers\VideoService;
use App\Helpers\WebScraper;

class VideoServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;
    
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(VideoService::class, function($app) {
            return new VideoService(new WebScraper());
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [VideoService::class];
    }
}
