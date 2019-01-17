<?php

namespace StoreTI\Transformers;

use League\Fractal\TransformerAbstract;
use StoreTI\Models\SaleOrder;

/**
 * Class SaleOrderTransformer.
 *
 * @package namespace StoreTI\Transformers;
 */
class SaleOrderTransformer extends TransformerAbstract
{
    /**
     * Transform the SaleOrder entity.
     *
     * @param \StoreTI\Models\SaleOrder $model
     *
     * @return array
     */
    public function transform(SaleOrder $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
