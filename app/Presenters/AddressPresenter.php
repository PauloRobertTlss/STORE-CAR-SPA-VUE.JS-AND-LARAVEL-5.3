<?php

namespace StorePoll\Presenters;

use StorePoll\Transformers\AddressTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class AddressPresenter.
 *
 * @package namespace StorePoll\Presenters;
 */
class AddressPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new AddressTransformer();
    }
}
