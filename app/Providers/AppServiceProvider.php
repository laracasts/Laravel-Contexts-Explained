<?php

namespace App\Providers;

use Illuminate\Log\Context\Repository;
use Illuminate\Support\Facades\Context;
use Illuminate\Support\ServiceProvider;

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
        // whenever a job is dispatched to the queue
        Context::dehydrating(function(Repository $context) {
            // $context->addHidden('locale', Config::get('app.locale'));
        });

        // whenever a queued job begins to execute
        Context::hydrated(function(Repository $context) {
            // if ($context->hasHidden('locale')) {
            //     Config::set('app.locale', $context->getHidden('locale'));
            // }
        });
    }
}
