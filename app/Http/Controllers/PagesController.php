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

class PagesController{

	protected $repository;
	protected $validator;
	protected $service;

	public function __construct(PageRepository $repository, PageValidator $validator, PageService $service){
		$this->repository = $repository;
		$this->validator  = $validator;
		$this->service  = $service;
	}

	/* USUÁRIO */

	public function single ($page) {
		$page = $this->repository->findByField('slug', $page)->first();

		if(count($page) == 0){
			return redirect()->route('error404');
		} else {
			$title = $page['title'] . " - Stephenson";
			return view('page', ['page' => $page, 'title' => $title]);
		}
	}

	/* PAINEL */

	public function index(){
		$pages = $this->repository->all();
		$title = "Páginas - Stephenson";

		return view('admin.pages.index', [
			'title' => $title,
			'pages' => $pages,
			'items' => "all"
		]);
	}

	public function trash(){
		$pages = $this->repository->getTrashed();
		$title = "Páginas - Stephenson";

		return view('admin.pages.index', [
			'title' => $title,
			'pages' => $pages,
			'items' => "trash"
		]);

	}

	public function create(){
		$title = "Adicionar Página - Stephenson";

		return view('admin.pages.create', [
			'title' => $title
		]);
	}

	public function edit($page){
		$page = $this->repository->find($page);
		$title = "Editar Página - Stephenson";

		return view('admin.pages.edit',[
			'title' => $title,
			'page' => $page
		]);
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
	* Update the specified resource in storage.
	*
	* @param  PageUpdateRequest $request
	* @param  string            $id
	*
	* @return Response
	*/
	public function update(Request $request, $id){
		$request = $this->service->update($request->all(), $id);
		$page = $request['success'] ? $request['data'] : null;

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
		$page = $request['success'] ? $request['data'] : null;

		session()->flash('success',[
			'success' =>	$request['success'],
			'messages' =>	$request['messages']
		]);

		return redirect()->back();
	}

	public function restore($id){
		$request = $this->service->restore($id);
		$page = $request['success'] ? $request['data'] : null;

		session()->flash('success',[
			'success' =>	$request['success'],
			'messages' =>	$request['messages']
		]);

		return redirect()->back();
	}

	public function deleteFromBD($id){
		$request = $this->service->deleteFromBD($id);
		$page = $request['success'] ? $request['data'] : null;

		session()->flash('success',[
			'success' =>	$request['success'],
			'messages' =>	$request['messages']
	]);

	return redirect()->back();
	}
}
