<?php

namespace StoreTI\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use StoreTI\Presenters\ProductPresenter;
use StoreTI\Repositories\Interfaces\ProductRepository;
use StoreTI\Models\Product;
use StoreTI\Validators\ProductValidator;

/**
 * Class ProductRepositoryEloquent.
 *
 * @package namespace StoreTI\Repositories;
 */
class ProductRepositoryEloquent extends BaseRepository implements ProductRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Product::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function presenter()
    {
      return ProductPresenter::class;
    }

}
