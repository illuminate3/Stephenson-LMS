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
use Auth;

class PostsController
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

	 public function all(){
		$this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
		$posts = $this->repository->all();
		$title = "Blog - Stephenson";

		return view('posts.all', [
      'posts' => $posts,
      'title' => $title
    ]);
    }

	public function single($post){
		$post = $this->repository->findByField('id', $post)->first();
    if(count($post) == 0){
      return redirect()->route('error404');
    } else {
  		$title = $post->title . " - Stephenson";
  		$comments = $this->commentsRepository->getComments($post->id,'post');

  		return view('posts.single', [
        'post' => $post,
        'comments' => $comments,
        'title' => $title
      ]);
    }
	}

    public function index(){
      $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
      $posts = $this->repository->all();
		  $loop = "all";
  		$title = "Postagens - Stephenson";

  		return view('admin.posts.index', [
        'title' => $title,
        'posts' => $posts,
        'loop' => $loop
      ]);
    }

	 public function trash(){
      $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
      $posts = $this->repository->getTrashed();
  		$loop = "trash";
  		$title = "Postagens - Stephenson";

  		return view('admin.posts.index', [
        'title' => $title,
        'posts' => $posts,
        'loop' => $loop
      ]);
    }

	public function create(){
    $categories_list = $this->categoriesRepository->selectBoxList();
    $title = "Adicionar Postagem - Stephenson";

    return view('admin.posts.create', [
      'title' => $title,
      'categories' => $categories_list
    ]);
	}

	public function edit($post){
		$categories_list = $this->categoriesRepository->selectBoxList();
		$post = $this->repository->find($post);
		$atual_category = $this->categoriesRepository->getAtualCategoryInfo($post['category_id']);
		$title = "Editar ".$post['title']." - Stephenson";

		return view('admin.posts.edit', [
      'title' => $title,
      'categories' => $categories_list,
      'post' => $post,
      'atual_category' => $atual_category
      ]);
	}


    public function store(PostCreateRequest $request){
     $author_id = ['author_id' => Auth::user()->id];
		 $request = $this->service->store($request->all() + $author_id);
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
