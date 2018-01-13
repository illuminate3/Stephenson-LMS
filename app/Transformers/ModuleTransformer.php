<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Module;

/**
 * Class CourseTransformer
 * @package namespace App\Transformers;
 */
 
class ModuleTransformer extends TransformerAbstract
{

    /**
     * Transform the Course entity
     * @param App\Entities\Course $model
     *
     * @return array
     */
    public function transform(Module $model)
    {
        return [
            'id'         => (int) $model->id,
        ];
    }
}
