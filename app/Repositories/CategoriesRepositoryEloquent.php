<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\CategoriesRepository;
use App\Entities\Categories;
use App\Validators\CategoriesValidator;

/**
 * Class CategoriesRepositoryEloquent
 * @package namespace App\Repositories;
 */
class CategoriesRepositoryEloquent extends BaseRepository implements CategoriesRepository
{
	
	public function selectBoxList($descricao = 'name', $chave = 'id'){
		return $this->model->all();
	}
	
	public function getAtualCategoryInfo($id){
		
		if($id == 0 || $id == null){
			return null;
		} else{
			$r = $this->find($id);
			return $r['attributes'];
		}
	}
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Categories::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return CategoriesValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
