<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\LessonRepository;
use App\Entities\Lesson;
use App\Entities\Material;
use App\Validators\LessonValidator;

/**
 * Class LessonRepositoryEloquent
 * @package namespace App\Repositories;
 */
class LessonRepositoryEloquent extends BaseRepository implements LessonRepository
{

	public function create_material($lesson, $material, $title, $content){
			$lesson_meta = new Material;
	    $lesson_meta->meta = serialize(['title' => $title, 'material_type' => $material, 'content' => $content]);
	    $lesson_meta->type = 'lesson';
	    $lesson_meta->type_id = $lesson;

      if($lesson_meta->save()){
			return true;
		}
	}
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Lesson::class;
    }


    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return LessonValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
