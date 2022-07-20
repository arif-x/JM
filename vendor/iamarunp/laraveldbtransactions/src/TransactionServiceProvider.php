<?php

namespace iamarunp\Laraveldbtransactions;

use Illuminate\Support\ServiceProvider;

class TransactionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

        // app('router')->aliasMiddleware('TransactionHandler', Middleware\TransactionHandler::class);
        $this->app->singleton('TransactionHandler', function ($app) {
            return new Middleware\TransactionHandler();
        });

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        //
    }
}
