<?php

namespace StoreTI\Presenters;

use StoreTI\Transformers\ProductDetailsTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ProductDetailsPresenter.
 *
 * @package namespace StoreTI\Presenters;
 */
class ProductDetailsPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ProductDetailsTransformer();
    }
}
