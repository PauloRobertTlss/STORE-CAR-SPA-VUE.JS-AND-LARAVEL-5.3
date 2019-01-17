<?php

namespace StorePool\Providers;

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
        $this->app->bind(\StorePoll\Repositories\CategoryRepository::class, \StorePoll\Repositories\CategoryRepositoryEloquent::class);
        $this->app->bind(\StorePoll\Repositories\ProductRepository::class, \StorePoll\Repositories\ProductRepositoryEloquent::class);
        $this->app->bind(\StorePoll\Repositories\TagRepository::class, \StorePoll\Repositories\TagRepositoryEloquent::class);
        $this->app->bind(\StorePoll\Repositories\SaleOrderRepository::class, \StorePoll\Repositories\SaleOrderRepositoryEloquent::class);
        $this->app->bind(\StorePoll\Repositories\SaleLineRepository::class, \StorePoll\Repositories\SaleLineRepositoryEloquent::class);
        $this->app->bind(\StorePoll\Repositories\CustomerRepository::class, \StorePoll\Repositories\CustomerRepositoryEloquent::class);
        $this->app->bind(\StorePoll\Repositories\UserRepository::class, \StorePoll\Repositories\UserRepositoryEloquent::class);
        $this->app->bind(\StorePoll\Repositories\AddressRepository::class, \StorePoll\Repositories\AddressRepositoryEloquent::class);
        //:end-bindings:
    }
}
