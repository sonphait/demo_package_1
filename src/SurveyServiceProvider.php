<?php

namespace Sonphait\Survey;

use Illuminate\Support\ServiceProvider;

class SurveyServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
    }
}
