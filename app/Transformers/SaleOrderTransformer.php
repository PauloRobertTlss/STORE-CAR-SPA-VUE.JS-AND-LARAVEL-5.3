<?php

namespace StorePoll\Transformers;

use League\Fractal\TransformerAbstract;
use StorePoll\Models\SaleOrder;

/**
 * Class SaleOrderTransformer.
 *
 * @package namespace StorePoll\Transformers;
 */
class SaleOrderTransformer extends TransformerAbstract
{
    /**
     * Transform the SaleOrder entity.
     *
     * @param \StorePoll\Models\SaleOrder $model
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
