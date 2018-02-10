<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\TutorialCreateRequest;
use App\Http\Requests\TutorialUpdateRequest;
use App\Repositories\TutorialRepository;
use App\Validators\TutorialValidator;
use App\Services\TutorialService;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Repositories\CategoriesRepository;
use App\Repositories\CommentRepository;


class TutorialsController{

    /**
     * @var TutorialRepository
     */
    protected $repository;

    /**
     * @var TutorialValidator
     */
    protected $validator;
    protected $service;

    public function __construct(TutorialRepository $repository, TutorialValidator $validator, TutorialService $service, CategoriesRepository $categoriesRepository, CommentRepository $commentsRepository)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
        $this->service  = $service;
		  $this->categoriesRepository  = $categoriesRepository;
		  $this->commentsRepository  = $commentsRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	
    public function archive(){
		$this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
		$tutorials = $this->repository->all();
		$categories = $this->categoriesRepository->getPrimaryCategories();
		$title = "Tutoriais - Escola LTG";
		 
		echo view('header', ['title' => $title, 'categories' => $categories]);
		echo view('tutorials/tutorials', ['tutorials' => $tutorials]);
		echo view('footer');
    }
	
	public function single($tutorial){
		$tutorial = $this->repository->find($tutorial);
		$title = $tutorial['title'] ." - Escola LTG";
		$categories = $this->categoriesRepository->getPrimaryCategories();
		$comments = $this->commentsRepository->getComments($tutorial->id,'tutorial');
		
		$url = $tutorial['video_url'];
		preg_match('/[\\?\\&]v=([^\\?\\&]+)/',$url,$matches);

		$id = $matches[1];
		$video_embed = '<iframe width="560" height="315" src="https://www.youtube.com/embed/'. $id . '" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>';
		
		echo view('header', ['title' => $title, 'categories' => $categories]);
		echo view('tutorials/tutorial', ['tutorial' => $tutorial, 'video_embed' => $video_embed, 'comments' => $comments]);
		echo view('footer');
	}
	
	 public function index(){
	   $tutorials = $this->repository->all();
		$loop = "all";
		$title = "Tutoriais - Escola LTG";
		echo view('admin.header', ['title' => $title]);
		echo view('admin.tutorials.index',['tutorials' => $tutorials, 'loop' => $loop]);
		echo view('admin.footer');
    }
	
	public function trash(){
	   $tutorials = $this->repository->getTrashed();
		$loop = "trash";
		$title = "Tutoriais - Escola LTG";
		echo view('admin.header', ['title' => $title]);
		echo view('admin.tutorials.index',['tutorials' => $tutorials, 'loop' => $loop]);
		echo view('admin.footer');
    }
	
	public function create(){
		$categories_list = $this->categoriesRepository->selectBoxList();
		$title = "Adicionar Tutorial - Escola LTG";
		echo view('admin.header', ['title' => $title]);
		echo view('admin.tutorials.create', ['categories' => $categories_list])->render();
		echo view('admin.footer')->render();
	}
	
	public function edit($tutorial){
		$categories_list = $this->categoriesRepository->selectBoxList();
		$tutorial = $this->repository->find($tutorial);
		$atual_category = $this->categoriesRepository->getAtualCategoryInfo($tutorial['category_id']);

		$title = "Editar " .$tutorial['title']." - Escola LTG";
		echo view('admin.header', ['title' => $title]);
		echo view('admin.tutorials.edit', ['categories' => $categories_list, 'tutorial' => $tutorial, 'atual_category' => $atual_category])->render();
		echo view('admin.footer')->render();
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param  TutorialCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(TutorialCreateRequest $request){
		 $request = $this->service->store($request->all()); 
		 $tutorial = $request['success'] ? $request['data'] : null;
		 
		  
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
		 $tutorial = $request['success'] ? $request['data'] : null;
		  
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
		 $tutorial = $request['success'] ? $request['data'] : null;
		  
		 session()->flash('success',[
			 'success' =>	$request['success'],
			 'messages' =>	$request['messages']
		 ]);
		 
		 return redirect()->back(); 
    }
	
	 public function restore($id){
       $request = $this->service->restore($id);
		 $tutorial = $request['success'] ? $request['data'] : null;
		  
		 session()->flash('success',[
			 'success' =>	$request['success'],
			 'messages' =>	$request['messages']
		 ]);
		 
		 return redirect()->back(); 
    }
	
	 public function deleteFromBD($id){
       $request = $this->service->deleteFromBD($id);
		 $tutorial = $request['success'] ? $request['data'] : null;
		  
		 session()->flash('success',[
			 'success' =>	$request['success'],
			 'messages' =>	$request['messages']
		 ]);
		 
		 return redirect()->back(); 
    }
}
