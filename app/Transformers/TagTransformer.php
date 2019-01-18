<?php

namespace StoreTI\Transformers;

use League\Fractal\TransformerAbstract;
use StoreTI\Models\Tag;

/**
 * Class TagTransformer.
 *
 * @package namespace StoreTI\Transformers;
 */
class TagTransformer extends TransformerAbstract
{
    /**
     * Transform the Tag entity.
     *
     * @param \StoreTI\Models\Tag $model
     *
     * @return array
     */
    public function transform(Tag $model)
    {
        return [
            'id'         => (int) $model->id,
            'title'         => (String) $model->title

        ];
    }
}
