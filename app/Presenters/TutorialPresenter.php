<?php

namespace App\Presenters;

use App\Transformers\TutorialTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class TutorialPresenter
 *
 * @package namespace App\Presenters;
 */
class TutorialPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new TutorialTransformer();
    }
}
