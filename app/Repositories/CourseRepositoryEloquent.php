<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\CourseRepository;
use App\Entities\Course;
use App\Validators\CourseValidator;
use App\Entities\CoursesMeta;

/**
 * Class CourseRepositoryEloquent
 * @package namespace App\Repositories;
 */
class CourseRepositoryEloquent extends BaseRepository implements CourseRepository
{
	
	public function enter_or_favorite_course($course, $user, $type){
		  $courses_meta = new CoursesMeta;
        $courses_meta->user_id = $user;
        $courses_meta->course_id = $course;
        $courses_meta->type = $type;
		
        if($courses_meta->save()){
			  return redirect()->back();
		  }
	}
	
	public function leave_course($course_id){
		  $courses_meta = new CoursesMeta;
        if($courses_meta->destroy($course_id)){
			  return redirect()->back();
		  }
	}
	
		
	public function user_joined($course, $user){
		  $courses_meta = new CoursesMeta;
		  return $courses_meta->where('user_id', $user)->where('course_id', $course)->where('type', 2)->first();

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
