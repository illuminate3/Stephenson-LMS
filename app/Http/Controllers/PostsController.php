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

class PostsController extends Controller
{

    protected $repository;
    protected $validator;
    protected $service;

    public function __construct(PostRepository $repository, PostValidator $validator, PostService $service, CategoriesRepository $categoriesRepository) {
        $this->repository = $repository;
        $this->validator  = $validator;
        $this->service  = $service;
		  $this->categoriesRepository  = $categoriesRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminIndex(){
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $posts = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $posts,
            ]);
        }
		 
		$title = "Postagens - Escola LTG";
		echo view('admin/header', ['title' => $title]);
		echo view('admin/posts',['posts' => $posts]);
		echo view('admin/footer');
    }
	
	public function adicionarPostagem(){
		$categories_list = $this->categoriesRepository->selectBoxList();
		$title = "Adicionar Postagem - Escola LTG";
		echo view('admin/header', ['title' => $title]);
		echo view('admin/add_post', ['categories' => $categories_list])->render();
		echo view('admin/footer')->render();
	}
	
	public function editarPostagem($post){
		$categories_list = $this->categoriesRepository->selectBoxList();
		$tutorial = $this->repository->find($tutorial);
		$title = "Editar ".$tutorial['title']." - Escola LTG";
		echo view('admin/header', ['title' => $title]);
		echo view('admin/edit_post', ['categories' => $categories_list, 'tutorial' => $tutorial])->render();
		echo view('admin/footer')->render();
	}


    /**
     * Store a newly created resource in storage.
     *
     * @param  PostCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(PostCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $post = $this->repository->create($request->all());

            $response = [
                'message' => 'Post created.',
                'data'    => $post->toArray(),
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
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $post,
            ]);
        }

        return view('posts.show', compact('post'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $post = $this->repository->find($id);

        return view('posts.edit', compact('post'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  PostUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(PostUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $post = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Post updated.',
                'data'    => $post->toArray(),
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
                'message' => 'Post deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Post deleted.');
    }
}
