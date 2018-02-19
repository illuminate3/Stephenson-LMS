<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\UserActivitiesRepository;
use App\Entities\UserActivities;
use App\Validators\UserActivitiesValidator;

/**
 * Class UserActivitiesRepositoryEloquent
 * @package namespace App\Repositories;
 */
class UserActivitiesRepositoryEloquent extends BaseRepository implements UserActivitiesRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
	
	public function newActivity($type, $user){
		
		  $activity = new UserActivities;
        $activity->user_id = $user;
        $activity->type = $type;
		
        if($activity->save()){
			  return redirect()->back();
		  }
	}
    public function model()
    {
        return UserActivities::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return UserActivitiesValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
