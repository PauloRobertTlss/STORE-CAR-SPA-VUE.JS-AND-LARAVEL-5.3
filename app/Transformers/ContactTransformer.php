<?php

namespace StorePoll\Transformers;

use League\Fractal\TransformerAbstract;
use StorePoll\Models\Contact;

/**
 * Class ContactTransformer.
 *
 * @package namespace StorePoll\Transformers;
 */
class ContactTransformer extends TransformerAbstract
{
    /**
     * Transform the Contact entity.
     *
     * @param \StorePoll\Models\Contact $model
     *
     * @return array
     */
    public function transform(Contact $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
