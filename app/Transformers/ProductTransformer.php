<?php

namespace StoreTI\Transformers;

use League\Fractal\TransformerAbstract;
use StoreTI\Models\Product;

/**
 * Class ProductTransformer.
 *
 * @package namespace StoreTI\Transformers;
 */
class ProductTransformer extends TransformerAbstract
{
    /**
     * Transform the Product entity.
     *
     * @param \StoreTI\Models\Product $model
     *
     * @return array
     */
    public function transform(Product $model)
    {
        return [
            'id'         => (int) $model->id,
            'name'         => (String) $model->name,
            'price'         => (float) $model->price,
            'image_path'         => (String) $model->image_path
        ];
    }
}
