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
            'title'         => (String) $model->title,
            'count_offers' => (int) $model->products()->count()

        ];
    }
}
