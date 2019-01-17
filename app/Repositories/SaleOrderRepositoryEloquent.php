<?php

namespace StorePoll\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use StorePoll\Repositories\SaleOrderRepository;
use StorePoll\Models\SaleOrder;
use StorePoll\Validators\SaleOrderValidator;

/**
 * Class SaleOrderRepositoryEloquent.
 *
 * @package namespace StorePoll\Repositories;
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
    
}
