<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);
        
        //Twitter Bootstrap dependency
        $this->publishes([
                            base_path('vendor/twbs') => public_path('assets'),
                            ], 'public');
        
        //JQuery dependency
        $this->publishes([
                            base_path('vendor/components') => public_path('assets'),
                            ], 'public');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
