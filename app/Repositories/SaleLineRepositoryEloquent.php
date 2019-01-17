<?php

namespace StoreTI\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use StoreTI\Repositories\Interfaces\SaleLineRepository;
use StoreTI\Models\SaleLine;

/**
 * Class SaleLineRepositoryEloquent.
 *
 * @package namespace StoreTI\Repositories;
 */
class SaleLineRepositoryEloquent extends BaseRepository implements SaleLineRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return SaleLine::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
