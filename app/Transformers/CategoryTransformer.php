<?php

namespace StorePoll\Transformers;

use League\Fractal\TransformerAbstract;
use StorePoll\Models\Category;

/**
 * Class CategoryTransformer.
 *
 * @package namespace StorePoll\Transformers;
 */
class CategoryTransformer extends TransformerAbstract
{
    /**
     * Transform the Category entity.
     *
     * @param \StorePoll\Models\Category $model
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
