<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Tutorial;

/**
 * Class TutorialTransformer
 * @package namespace App\Transformers;
 */
class TutorialTransformer extends TransformerAbstract
{

    /**
     * Transform the Tutorial entity
     * @param App\Entities\Tutorial $model
     *
     * @return array
     */
    public function transform(Tutorial $model)
    {
        return [
            'id' => (int)$model->id,
            'thumbnail' => $new_image_name,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
