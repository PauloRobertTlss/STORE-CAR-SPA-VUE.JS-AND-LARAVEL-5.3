<?php

namespace StoreTI\Transformers;

use League\Fractal\TransformerAbstract;
use StoreTI\Models\Customer;

/**
 * Class CustomerTransformer.
 *
 * @package namespace StoreTI\Transformers;
 */
class CustomerTransformer extends TransformerAbstract
{

    protected $defaultIncludes = ['contacts'];
    /**
     * Transform the Customer entity.
     *
     * @param \StoreTI\Models\Customer $model
     *
     * @return array
     */
    public function transform(Customer $model)
    {
        return [
            'id'         => (int) $model->id,
            'name'         => (string) $model->name

        ];
    }

    public function includeContacts(Customer $model){
        return $this->collection($model->contacts,new ContactTransformer());
    }
}
