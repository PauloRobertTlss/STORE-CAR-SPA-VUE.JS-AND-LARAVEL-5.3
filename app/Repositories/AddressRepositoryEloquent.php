<?php

namespace StorePoll\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use StorePoll\Repositories\Interfaces\AddressRepository;
use StorePoll\Models\Address;
use StorePoll\Validators\AddressValidator;

/**
 * Class AddressRepositoryEloquent.
 *
 * @package namespace StorePoll\Repositories;
 */
class AddressRepositoryEloquent extends BaseRepository implements AddressRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Address::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
