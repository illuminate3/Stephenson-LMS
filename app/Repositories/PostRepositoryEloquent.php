<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\PostRepository;
use App\Entities\Post;
use App\Validators\PostValidator;

/**
 * Class PostRepositoryEloquent
 * @package namespace App\Repositories;
 */
class PostRepositoryEloquent extends BaseRepository implements PostRepository
{
	public function getTrashed(){
		return $this->model->onlyTrashed()->get();
	}
	
	public function restore($id){
		$this->model->withTrashed()->find($id)->restore();
	}
	
	public function deleteFromBD($id){
		$this->model->withTrashed()->find($id)->forceDelete();
	}
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Post::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return PostValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
