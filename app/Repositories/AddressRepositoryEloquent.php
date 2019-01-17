<?php

namespace StoreTI\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use StoreTI\Repositories\Interfaces\AddressRepository;
use StoreTI\Models\Address;
use StoreTI\Validators\AddressValidator;

/**
 * Class AddressRepositoryEloquent.
 *
 * @package namespace StoreTI\Repositories;
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
