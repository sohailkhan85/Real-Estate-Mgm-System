<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

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
        // To Access HomeTypes on all pages
        $homeTypes = DB::table('home_types')->get();
        View::share('homeTypes', $homeTypes );

        // To Access Props on all pages
        $props = DB::table('props')->get();
        View::share('props', $props );
    }
}
