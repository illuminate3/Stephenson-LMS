<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\UserRepository;
use App\Entities\User;
use App\Entities\Followers;
use App\Validators\UserValidator;
use Auth;

/**
 * Class UserRepositoryEloquent
 * @package namespace App\Repositories;
 */
class UserRepositoryEloquent extends BaseRepository implements UserRepository
{

	public function getProfileInfo($user){
		$user = $this->model->where('user', $user)->first();

		if(Auth::check()){
			$isLoggedProfile = ($user->id == Auth::user()->id) ? true : false;
		} else{
			$isLoggedProfile = false;
		}

		if($isLoggedProfile){
			$isFollowing = false;
		} else{
			$user_id = $user->id;
			$current_user = Auth::user()->id;

			$isFollowing = Followers::where('followed', $user_id)->where('follower', $current_user)->first();
			$isFollowing = (is_null($isFollowing)) ? false : true;
		}

		return (object) array('user' => $user, 'isLoggedProfile' => $isLoggedProfile, 'isFollowing' => $isFollowing);
	}
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return UserValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
