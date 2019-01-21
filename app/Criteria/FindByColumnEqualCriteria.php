<?php

namespace StoreTI\Criteria;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class FindByColumnEqualCriteria
 * @package StoreTI\Criteria
 */
class FindByColumnEqualCriteria implements CriteriaInterface
{
    /**
     * @var
     */
    private $id;
    /**
     * @var string
     */
    private $collumn;

    public function __construct($search, $collumn = 'user_id')
    {
        $this->id = $search;
        $this->collumn = $collumn;
    }

    /**
     * Apply criteria in query repository
     *
     * @param                     $model
     * @param RepositoryInterface $repository
     *
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {
        return $model->join('product_categories',function ($join) {
             $join->on('products.id', '=', 'product_categories.product_id')
            ->where($this->collumn, '=', $this->id);
    });

    }
}
