<?php

namespace StorePoll\Transformers;

use League\Fractal\TransformerAbstract;
use StorePoll\Models\Tag;

/**
 * Class TagTransformer.
 *
 * @package namespace StorePoll\Transformers;
 */
class TagTransformer extends TransformerAbstract
{
    /**
     * Transform the Tag entity.
     *
     * @param \StorePoll\Models\Tag $model
     *
     * @return array
     */
    public function transform(Tag $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
