<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use Carbon\Carbon;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Configure Carbon to use French locale
        Carbon::setLocale('fr');
        
        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }
    }
}