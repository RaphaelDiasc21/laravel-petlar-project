<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\CloudinaryConfigService;

class CloudinaryConfigProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
       $this->app->singleton(CloudinaryConfigService::class,function($app){
           return CloudinaryConfigService::configuration();
       });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
