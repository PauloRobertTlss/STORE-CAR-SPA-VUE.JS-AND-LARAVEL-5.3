<?php

namespace StoreTI\Transformers;

use League\Fractal\TransformerAbstract;
use StoreTI\Models\SaleLine;

/**
 * Class SaleLineTransformer.
 *
 * @package namespace StoreTI\Transformers;
 */
class SaleLineTransformer extends TransformerAbstract
{

    protected $defaultIncludes = ['product'];
    /**
     * Transform the SaleOrder entity.
     *
     * @param \StoreTI\Models\SaleLine $model
     *
     * @return array
     */
    public function transform(SaleLine $model)
    {
        return [
            'id'         => (int) $model->id,
            'units'         => (int) $model->units,
            'price_current'         => (float) $model->price_current,
        ];
    }

    public function includeProduct(SaleLine $model)
    {
            return $this->item($model->product, new ProductTransformer());
    }



}
