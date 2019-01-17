<?php

namespace StoreTI\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\StoreTI\Repositories\Interfaces\CategoryRepository::class, \StoreTI\Repositories\CategoryRepositoryEloquent::class);
        $this->app->bind(\StoreTI\Repositories\Interfaces\ProductRepository::class, \StoreTI\Repositories\ProductRepositoryEloquent::class);
        $this->app->bind(\StoreTI\Repositories\Interfaces\TagRepository::class, \StoreTI\Repositories\TagRepositoryEloquent::class);
        $this->app->bind(\StoreTI\Repositories\Interfaces\SaleOrderRepository::class, \StoreTI\Repositories\SaleOrderRepositoryEloquent::class);
        $this->app->bind(\StoreTI\Repositories\Interfaces\SaleLineRepository::class, \StoreTI\Repositories\SaleLineRepositoryEloquent::class);
        $this->app->bind(\StoreTI\Repositories\Interfaces\CustomerRepository::class, \StoreTI\Repositories\CustomerRepositoryEloquent::class);
        $this->app->bind(\StoreTI\Repositories\Interfaces\UserRepository::class, \StoreTI\Repositories\UserRepositoryEloquent::class);
        $this->app->bind(\StoreTI\Repositories\Interfaces\AddressRepository::class, \StoreTI\Repositories\AddressRepositoryEloquent::class);
        $this->app->bind(\StoreTI\Repositories\Interfaces\ContactRepository::class, \StoreTI\Repositories\ContactRepositoryEloquent::class);
        //:end-bindings:
    }
}
