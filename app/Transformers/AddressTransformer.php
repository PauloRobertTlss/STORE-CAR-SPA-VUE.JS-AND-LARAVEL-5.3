<?php

namespace StorePoll\Transformers;

use League\Fractal\TransformerAbstract;
use StorePoll\Models\Address;

/**
 * Class AddressTransformer.
 *
 * @package namespace StorePoll\Transformers;
 */
class AddressTransformer extends TransformerAbstract
{
    /**
     * Transform the Address entity.
     *
     * @param \StorePoll\Models\Address $model
     *
     * @return array
     */
    public function transform(Address $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
