<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\LessonsMetaRepository;
use App\Entities\LessonsMeta;
use App\Entities\Lesson;
use App\Validators\LessonsMetaValidator;
use Auth;

/**
 * Class LessonsMetaRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class LessonsMetaRepositoryEloquent extends BaseRepository implements LessonsMetaRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */

    function percentualCompleted($course){
      $total = (int) Lesson::where(['course_id' => $course])->count();
      $completed = (int) $this->findWhere(['course_id' => $course, 'user_id' => Auth::user()->id])->count();
      $percent = ($completed / $total) * 100;
      return $percent;
    }

    public function LastLessonCompleted($course){
      $last_lesson = $this->findWhere(['course_id' => $course, 'user_id' => Auth::user()->id])->sortBy('created_at')->first();
      if(is_null($last_lesson)){
        $last_lesson = Lesson::where('course_id', $course)->where('position', 0)->first();
        return $last_lesson->id;
      } else{
        return $last_lesson->lesson_id;
      }
    }

    public function IsCompleted($lesson){
      $f = $this->findWhere(['lesson_id' => $lesson, 'user_id' => Auth::user()->id])->first();
      return (is_null($f)) ? false : true;
    }

    public function model()
    {
        return LessonsMeta::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
