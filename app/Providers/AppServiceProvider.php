<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191); //Solved by increasing StringLength
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        config([
            'laravellocalization.supportedLocales' => [
                'en'  => array( 'name' => 'English', 'script' => 'Latn', 'native' => 'English' ),
                'fr' => array( 'name' => 'Français', 'script' => 'Latn', 'native' => 'Français' )
            ],
            'laravellocalization.hideDefaultLocaleInURL' => true,

            'translatable.locales' => [
                     'en',
                     'fr'
            ],
        ]);
    }
}
