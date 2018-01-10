<?php

namespace App\Presenters;

use App\Transformers\LessonTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class LessonPresenter
 *
 * @package namespace App\Presenters;
 */
class LessonPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new LessonTransformer();
    }
}
