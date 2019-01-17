<?php

namespace StorePoll\Presenters;

use StorePoll\Transformers\TagTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class TagPresenter.
 *
 * @package namespace StorePoll\Presenters;
 */
class TagPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new TagTransformer();
    }
}
