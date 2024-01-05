<?php

namespace App\Providers;

use App\Grants\Code;
use App\Grants\OneTimeEmail;
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
        $this->bootGrants();
    }

    public function bootGrants() {
        $oneTimeEmail = new OneTimeEmail();
        $code = new Code();

//        app(AuthorizationServer::class)->enableGrantType( $oneTimeEmail, Passport::tokensExpireIn() );
//        app(AuthorizationServer::class)->enableGrantType( $code, Passport::tokensExpireIn() );
    }
}
