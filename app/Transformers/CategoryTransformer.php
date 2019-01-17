<?php

namespace StoreTI\Transformers;

use League\Fractal\TransformerAbstract;
use StoreTI\Models\Category;

/**
 * Class CategoryTransformer.
 *
 * @package namespace StoreTI\Transformers;
 */
class CategoryTransformer extends TransformerAbstract
{
    /**
     * Transform the Category entity.
     *
     * @param \StoreTI\Models\Category $model
     *
     * @return array
     */
    public function transform(Category $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
