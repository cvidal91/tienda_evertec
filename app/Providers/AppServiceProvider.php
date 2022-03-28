<?php

namespace App\Providers;

use App\Services\PaymentServices\PaymentContractInterface;
use App\Services\PaymentServices\PlaceToPayService;
use Illuminate\Support\ServiceProvider;
use Dnetix\Redirection\PlacetoPay;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(PlacetoPay::class, function(){
            return new PlacetoPay([
                'login' => config('services.placetopay.login'),
                'tranKey' => config('services.placetopay.tranKey'),
                'baseUrl' => config('services.placetopay.baseUrl'),
            ]);
        });
        
        $this->app->bind(PaymentContractInterface::class, PlaceToPayService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrapFive();
    }
}
