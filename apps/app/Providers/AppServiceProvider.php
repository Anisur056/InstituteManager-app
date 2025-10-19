<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View; // Import the View Facade
use App\Http\View\NoticeComposer; // Import your composer

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
        // Option 1: Apply to a specific view
        // The path should match your layout file's path (e.g., 'layouts.app')
        View::composer('website.themes.main', NoticeComposer::class);

        // Option 2: Apply to multiple views
        // View::composer(['layouts.app', 'layouts.admin'], NavComposer::class);
    }
}
