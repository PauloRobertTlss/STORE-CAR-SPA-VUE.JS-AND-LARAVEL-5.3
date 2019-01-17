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

    protected $defaultIncludes = ['tags','categories'];
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
            'description'         => (String) $model->description,
            'image_path'         => (String) $model->image_path
        ];
    }

    public function includeCategories(Product $model){
        $trans = new CategoryTransformer();
        $trans->setDefaultIncludes([]);
        return $this->collection($model->categories, $trans);
    }

    public function includeTags(Product $model){
        return $this->collection($model->tags, new TagTransformer());
    }


}
