<?php

namespace StoreTI\Transformers;

use League\Fractal\TransformerAbstract;
use StoreTI\Models\Address;

/**
 * Class AddressTransformer.
 *
 * @package namespace StoreTI\Transformers;
 */
class AddressTransformer extends TransformerAbstract
{
    /**
     * Transform the Address entity.
     *
     * @param \StoreTI\Models\Address $model
     *
     * @return array
     */
    public function transform(Address $model)
    {
        return [
            'id'         => (int) $model->id,
            'route'         => (string) $model->id,
            'number'         => (int) $model->number,
            'neighborhood'         => (string) $model->neighborhood,
            'city'         => (string) $model->city,
            'state'         => (string) $model->state,
        ];
    }
}
