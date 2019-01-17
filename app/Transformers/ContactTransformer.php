<?php

namespace StoreTI\Transformers;

use League\Fractal\TransformerAbstract;
use StoreTI\Models\Contact;

/**
 * Class ContactTransformer.
 *
 * @package namespace StoreTI\Transformers;
 */
class ContactTransformer extends TransformerAbstract
{
    /**
     * Transform the Contact entity.
     *
     * @param \StoreTI\Models\Contact $model
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
