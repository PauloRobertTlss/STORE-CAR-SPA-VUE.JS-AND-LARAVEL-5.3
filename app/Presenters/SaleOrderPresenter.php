<?php

namespace StoreTI\Presenters;

use StoreTI\Transformers\SaleOrderTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class SaleOrderPresenter.
 *
 * @package namespace StoreTI\Presenters;
 */
class SaleOrderPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new SaleOrderTransformer();
    }
}
