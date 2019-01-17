<?php

namespace StorePoll\Transformers;

use League\Fractal\TransformerAbstract;
use StorePoll\Models\Customer;

/**
 * Class CustomerTransformer.
 *
 * @package namespace StorePoll\Transformers;
 */
class CustomerTransformer extends TransformerAbstract
{
    /**
     * Transform the Customer entity.
     *
     * @param \StorePoll\Models\Customer $model
     *
     * @return array
     */
    public function transform(Customer $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
