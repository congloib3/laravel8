<?php

namespace App\Providers;

use App\Billing\PaymentGateway;
use App\Models\User;
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

        $this->app->bind('MyUser', function($app) {
            return new User;
        });
        //
        $this->app->bind(PaymentGateway::class, function($app){
            return new PaymentGateway('usd');
        });
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
