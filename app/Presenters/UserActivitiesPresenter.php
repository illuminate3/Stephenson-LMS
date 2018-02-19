<?php

namespace App\Presenters;

use App\Transformers\UserActivitiesTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class UserActivitiesPresenter
 *
 * @package namespace App\Presenters;
 */
class UserActivitiesPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new UserActivitiesTransformer();
    }
}
