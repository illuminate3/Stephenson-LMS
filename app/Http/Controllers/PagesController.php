<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\PageCreateRequest;
use App\Http\Requests\PageUpdateRequest;
use App\Repositories\PageRepository;
use App\Validators\PageValidator;
use App\Services\PageService;
use App\Repositories\CategoriesRepository;

class PagesController extends Controller{

    protected $repository;
    protected $validator;
    protected $service;
	
	 protected $categories_repository;

    public function __construct(PageRepository $repository, PageValidator $validator, PageService $service)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
        $this->service  = $service;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	/*
	 public function index($page, CategoriesRepository $categories_repository) {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $page = $this->repository->findByField('slug', $page)->first();
		 $this->categoriesRepository 	= $categories_repository;
		 $categories = $this->categoriesRepository->getPrimaryCategories();
			$title = $page['title'] . " - Escola LTG";
			echo view('header', ['title' => $title,'categories' => $categories]);
			echo view('page', ['page' => $page]);
			echo view('footer');
    }
	*/
	
    public function index(){
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $pages = $this->repository->all();

			$title = "Páginas - Escola LTG";
			echo view('admin.header', ['title' => $title]);
			echo view('admin.pages.index', ['pages' => $pages]);
			echo view('admin.footer');
    }
	
	public function create(){
		$title = "Adicionar Página - Escola LTG";
		echo view('admin.header', ['title' => $title]);
		echo view('admin.pages.create');
		echo view('admin.footer');
	}

	public function edit($page){
		$page = $this->repository->find($page);
		$title = "Editar Página - Escola LTG";
		echo view('admin.header', ['title' => $title]);
		echo view('admin.pages.edit',['page' => $page]);
		echo view('admin.footer');
	}
    /**
     * Store a newly created resource in storage.
     *
     * @param  PageCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(PageCreateRequest $request){
		 $request = $this->service->store($request->all()); 
		 $page = $request['success'] ? $request['data'] : null;
		  
		 session()->flash('success',[
			 'success' =>	$request['success'],
			 'messages' =>	$request['messages']
		 ]);
		 
		 return redirect()->back(); 
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $page = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $page,
            ]);
        }

        return view('pages.show', compact('page'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  PageUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(PageUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $page = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Page updated.',
                'data'    => $page->toArray(),
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
                'message' => 'Page deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Page deleted.');
    }
}
