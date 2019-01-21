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
            'contact'         => (String) $model->contact,
            'type'         => (String) $model->type
        ];
    }
}
