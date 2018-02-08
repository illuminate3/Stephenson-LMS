<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\LessonRepository;
use App\Entities\Lesson;
use App\Entities\LessonsMeta;
use App\Validators\LessonValidator;

/**
 * Class LessonRepositoryEloquent
 * @package namespace App\Repositories;
 */
class LessonRepositoryEloquent extends BaseRepository implements LessonRepository
{
	
	public function create_material($lesson, $material, $title, $content){
		$lesson_meta = new LessonsMeta;
      $lesson_meta->lesson_id = $lesson;
      $lesson_meta->content = $content;
		$lesson_meta->title = $title;
      $lesson_meta->type = $material;
		
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
