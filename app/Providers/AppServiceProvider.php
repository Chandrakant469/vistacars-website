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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        define('MOBILE_NUMBER', '9209200071');
        define('EMAIL', 'info@vistacars.in');
        define('ADDRESS', '1-8, Aditya Planet, Sec - 10, Mumbai-Pune Highway , Kopra-Kharghar, Navi Mumbai - 410210');
        // Recaptcha  
        define('RECAPTCHA_SECRET_KEY', '6LeIxAcTAAAAAGG-vFI1TnRWxMZNFuojJ4WifJWe');
        define('RECAPTCHA_SITE_KEY', '6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI');
    }
}
