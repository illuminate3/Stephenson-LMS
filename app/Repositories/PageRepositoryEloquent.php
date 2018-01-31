<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\PageRepository;
use App\Entities\Page;
use App\Validators\PageValidator;

/**
 * Class PageRepositoryEloquent
 * @package namespace App\Repositories;
 */
class PageRepositoryEloquent extends BaseRepository implements PageRepository
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
        return Page::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return PageValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
