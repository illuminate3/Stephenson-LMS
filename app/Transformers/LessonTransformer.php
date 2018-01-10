<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Lesson;

/**
 * Class LessonTransformer
 * @package namespace App\Transformers;
 */
class LessonTransformer extends TransformerAbstract
{

    /**
     * Transform the Lesson entity
     * @param App\Entities\Lesson $model
     *
     * @return array
     */
    public function transform(Lesson $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
