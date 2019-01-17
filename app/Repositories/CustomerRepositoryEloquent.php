<?php

namespace StorePoll\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use StorePoll\Repositories\CustomerRepository;
use StorePoll\Models\Customer;
use StorePoll\Validators\CustomerValidator;

/**
 * Class CustomerRepositoryEloquent.
 *
 * @package namespace StorePoll\Repositories;
 */
class CustomerRepositoryEloquent extends BaseRepository implements CustomerRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Customer::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
