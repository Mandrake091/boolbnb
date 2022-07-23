<?php

namespace App\Providers;

use Braintree\Gateway;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        // $gateway = new Braintree\Gateway([
        //     'environment' => 'sandbox',
        //     'merchantId' => 'your_merchant_id',
        //     'publicKey' => 'your_public_key',
        //     'privateKey' => 'your_private_key'
        // ]);

        $this->app->singleton(Gateway::class, function ($app) {
            return new Gateway(
                [
                    'environment' => 'sandbox',
                    'merchantId' => 'hb7cryqftbwy6dvj',
                    'publicKey' => '42b5f5rsdbvb9jb7',
                    'privateKey' => '957745d6313bdf04b188ed8edd6aa561'
                ]
            );
        });
    }
}