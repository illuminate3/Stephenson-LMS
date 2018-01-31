<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\PostCreateRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Repositories\PostRepository;
use App\Validators\PostValidator;
use App\Services\PostService;
use App\Repositories\CategoriesRepository;
use App\Repositories\CommentRepository;

class PostsController extends Controller
{

    protected $repository;
    protected $validator;
    protected $service;

    public function __construct(PostRepository $repository, PostValidator $validator, PostService $service, CategoriesRepository $categoriesRepository,CommentRepository $commentsRepository) {
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
		$posts = $this->repository->all();
		$categories = $this->categoriesRepository->getPrimaryCategories();
		$title = "Blog - Escola LTG";
		 
		echo view('header', ['title' => $title, 'categories' => $categories]);
		echo view('blog.blog', ['posts' => $posts]);
		echo view('footer');
    }
	
	public function single($post){
		$post = $this->repository->find($post);
		$title = $post['title'] ." - Escola LTG";
		$categories = $this->categoriesRepository->getPrimaryCategories();
		$comments = $this->commentsRepository->getComments($post->id,'post');

		echo view('header', ['title' => $title, 'categories' => $categories]);
		echo view('blog.post', ['post' => $post, 'comments' => $comments]);
		echo view('footer');
	}
	
    public function index(){
      $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
      $posts = $this->repository->all();
		$loop = "all";
		 
		$title = "Postagens - Escola LTG";
		echo view('admin.header', ['title' => $title]);
		echo view('admin.posts.index',['posts' => $posts, 'loop' => $loop]);
		echo view('admin.footer');
    }
	
	 public function trash(){
      $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
      $posts = $this->repository->getTrashed();
		$loop = "trash";
		 
		$title = "Postagens - Escola LTG";
		echo view('admin.header', ['title' => $title]);
		echo view('admin.posts.index',['posts' => $posts, 'loop' => $loop]);
		echo view('admin.footer');
    }
	
	public function create(){
		$categories_list = $this->categoriesRepository->selectBoxList();
		$title = "Adicionar Postagem - Escola LTG";
		echo view('admin.header', ['title' => $title]);
		echo view('admin.posts.create', ['categories' => $categories_list])->render();
		echo view('admin.footer')->render();
	}
	
	public function edit($post){
		$categories_list = $this->categoriesRepository->selectBoxList();
		$post = $this->repository->find($post);
		$atual_category = $this->categoriesRepository->getAtualCategoryInfo($post['category_id']);
		
		$title = "Editar ".$post['title']." - Escola LTG";
		echo view('admin.header', ['title' => $title]);
		echo view('admin.posts.edit', ['categories' => $categories_list, 'post' => $post, 'atual_category' => $atual_category])->render();
		echo view('admin.footer')->render();
	}


    public function store(PostCreateRequest $request){
		 $request = $this->service->store($request->all()); 
		 $post = $request['success'] ? $request['data'] : null;
		 
		  
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
		 $post = $request['success'] ? $request['data'] : null;
		  
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
		 $post = $request['success'] ? $request['data'] : null;
		  
		 session()->flash('success',[
			 'success' =>	$request['success'],
			 'messages' =>	$request['messages']
		 ]);
		 
		 return redirect()->back(); 
    }
	
		 public function restore($id){
       $request = $this->service->restore($id);
		 $post = $request['success'] ? $request['data'] : null;
		  
		 session()->flash('success',[
			 'success' =>	$request['success'],
			 'messages' =>	$request['messages']
		 ]);
		 
		 return redirect()->back(); 
    }
	
	 public function deleteFromBD($id){
       $request = $this->service->deleteFromBD($id);
		 $post = $request['success'] ? $request['data'] : null;
		  
		 session()->flash('success',[
			 'success' =>	$request['success'],
			 'messages' =>	$request['messages']
		 ]);
		 
		 return redirect()->back(); 
    }
}
