<?php

namespace StorePoll\Presenters;

use StorePoll\Transformers\SaleOrderTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class SaleOrderPresenter.
 *
 * @package namespace StorePoll\Presenters;
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
