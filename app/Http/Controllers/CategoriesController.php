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



class CategoriesController extends Controller{
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

		$title = "Categorias - Escola LTG";
		echo view('admin.header', ['title' => $title]);
		echo view('admin.categories.index',['categories' => $categories]);
		echo view('admin.footer');
    }
	
	public function edit($category){
		$categories_list= $this->repository->all();
		$category = $this->repository->find($category);
		$title = "Editar " .$category['name'] . " - Escola LTG";
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	/*
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $categories = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $categories,
            ]);
        }

        return view('categories.index', compact('categories'));
    }*/

    /**
     * Update the specified resource in storage.
     *
     * @param  CategoriesUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(CategoriesUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $category = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Categories updated.',
                'data'    => $category->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Categories deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Categories deleted.');
    }
}
