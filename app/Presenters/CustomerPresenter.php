<?php

namespace StorePoll\Presenters;

use StorePoll\Transformers\CustomerTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class CustomerPresenter.
 *
 * @package namespace StorePoll\Presenters;
 */
class CustomerPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new CustomerTransformer();
    }
}
