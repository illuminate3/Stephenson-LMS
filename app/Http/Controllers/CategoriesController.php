<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\CategoriesCreateRequest;
use App\Http\Requests\CategoriesUpdateRequest;
use App\Repositories\CategoriesRepository;
use App\Validators\CategoriesValidator;
use App\Services\CategoriesService;



class CategoriesController{
    protected $repository;
    protected $validator;
    protected $service;

    public function __construct(CategoriesRepository $repository, CategoriesValidator $validator, CategoriesService $service)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
        $this->service  = $service;
		 
    }

	 public function index(){
		$this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
		$categories = $this->repository->all();

		$title = "Categorias - Stephenson";
		echo view('admin.header', ['title' => $title]);
		echo view('admin.categories.index',['categories' => $categories]);
		echo view('admin.footer');
    }
	
	public function edit($category){
		$categories_list= $this->repository->all();
		$category = $this->repository->find($category);
		$title = "Editar " .$category['name'] . " - Stephenson";
		echo view('admin.header', ['title' => $title]);
		echo view('admin.categories.edit',['category' => $category, 'categories_list'=> $categories_list]);
		echo view('admin.footer');
	}
	
    /**
     * Store a newly created resource in storage.
     *
     * @param  TutorialCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CategoriesCreateRequest $request){
		 
		 $request = $this->service->store($request->all());
		 $categories = $request['success'] ? $request['data'] : null;
		 
		 
		 session()->flash('success',[
			 'success' =>	$request['success'],
			 'messages' =>	$request['messages']
		 ]);
		 
		 return redirect()->back(); 
    }

        /**
     * Update the specified resource in storage.
     *
     * @param  PageUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(Request $request, $id){
		 $request = $this->service->update($request->all(), $id); 
		 $category = $request['success'] ? $request['data'] : null;
		  
		 session()->flash('success',[
			 'success' =>	$request['success'],
			 'messages' =>	$request['messages']
		 ]);
		 
		 return redirect()->back(); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
       $request= $this->service->delete($id);
		 $category = $request['success'] ? $request['data'] : null;
		  
		 session()->flash('success',[
			 'success' =>	$request['success'],
			 'messages' =>	$request['messages']
		 ]);
		 
		 return redirect()->back(); 
    }
	
	public function category($category){
		$title = $category . " - Stephenson";	
		
		echo view('header', ['title' => $title]);
		echo view('categories.category');
		echo view('footer');
	}
}
