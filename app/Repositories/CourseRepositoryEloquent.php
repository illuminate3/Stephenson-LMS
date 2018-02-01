<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\CourseRepository;
use App\Entities\Course;
use App\Validators\CourseValidator;
use App\Entities\CourseMeta;

/**
 * Class CourseRepositoryEloquent
 * @package namespace App\Repositories;
 */
class CourseRepositoryEloquent extends BaseRepository implements CourseRepository
{
	
	public function enter_course($course, $user){
		  $course_meta = new CourseMeta;
        $course_meta->user_id = $user;
        $course_meta->course_id = $course;
        if($course_meta->save()){
			  return redirect()->back();
		  }
	}
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Course::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return CourseValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
