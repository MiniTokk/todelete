<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Contracts\Services\IqTestServiceInterface', 'App\Services\IqTestService');
        $this->app->bind('App\Contracts\Dao\IqTestDaoInterface', 'App\Dao\IqTestDao');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
