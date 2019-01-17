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
        $this->app->bind(\StorePoll\Repositories\Interfaces\CategoryRepository::class, \StorePoll\Repositories\CategoryRepositoryEloquent::class);
        $this->app->bind(\StorePoll\Repositories\Interfaces\ProductRepository::class, \StorePoll\Repositories\ProductRepositoryEloquent::class);
        $this->app->bind(\StorePoll\Repositories\Interfaces\TagRepository::class, \StorePoll\Repositories\TagRepositoryEloquent::class);
        $this->app->bind(\StorePoll\Repositories\Interfaces\SaleOrderRepository::class, \StorePoll\Repositories\SaleOrderRepositoryEloquent::class);
        $this->app->bind(\StorePoll\Repositories\Interfaces\SaleLineRepository::class, \StorePoll\Repositories\SaleLineRepositoryEloquent::class);
        $this->app->bind(\StorePoll\Repositories\Interfaces\CustomerRepository::class, \StorePoll\Repositories\CustomerRepositoryEloquent::class);
        $this->app->bind(\StorePoll\Repositories\Interfaces\UserRepository::class, \StorePoll\Repositories\UserRepositoryEloquent::class);
        $this->app->bind(\StorePoll\Repositories\Interfaces\AddressRepository::class, \StorePoll\Repositories\AddressRepositoryEloquent::class);
        $this->app->bind(\StorePoll\Repositories\Interfaces\ContactRepository::class, \StorePoll\Repositories\ContactRepositoryEloquent::class);
        //:end-bindings:
    }
}
