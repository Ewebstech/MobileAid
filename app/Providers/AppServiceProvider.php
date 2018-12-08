<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Blade;
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
        // Force SSL in production
        if ($this->app->environment() == 'production') {
            URL::forceScheme('https');
        }
        
        $app_logo = env('LOGO_URL','');
        view()->share('appLogo', $app_logo);  

        /*
        |--------------------------------------------------------------------------
        | Extend blade so we can define a variable
        | <code>
        | @define $variable = "whatever"
        | </code>
        |--------------------------------------------------------------------------
        */

        \Blade::extend(function($value) {
            return preg_replace('/\@define(.+)/', '<?php ${1}; ?>', $value);
        });
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
