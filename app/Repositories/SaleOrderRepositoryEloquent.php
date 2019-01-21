<?php

namespace StoreTI\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use StoreTI\Presenters\SaleOrderPresenter;
use StoreTI\Repositories\Interfaces\SaleOrderRepository;
use StoreTI\Models\SaleOrder;
use StoreTI\Validators\SaleOrderValidator;

/**
 * Class SaleOrderRepositoryEloquent.
 *
 * @package namespace StoreTI\Repositories;
 */
class SaleOrderRepositoryEloquent extends BaseRepository implements SaleOrderRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return SaleOrder::class;
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
       return SaleOrderPresenter::class;
    }

}
