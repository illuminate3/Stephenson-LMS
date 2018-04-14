<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Repositories\UserRepository;
use App\Validators\UserValidator;
use App\Services\UserService;
use Exception;
use Auth;


class UsersController{
   protected $service;
   protected $repository;
	 protected $validator;
	 protected $categories_repository;

    public function __construct(UserRepository $repository, UserValidator $validator, UserService $service){
        $this->repository 	= $repository;
        $this->service 		= $service;
        $this->validator 	= $validator;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
      $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
      $users = $this->repository->paginate();
		 	$title = "Usuários - Stephenson";

			return view('admin.users.index', [
        'title' => $title,
        'users' => $users
      ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  UserCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */

	 public function create(){
		 $title = "Adicionar Usuário - Stephenson";

		 return view('admin.users.create', [
       'title' => $title
     ]);
	 }


    public function store(UserCreateRequest $request){
		 $request = $this->service->store($request->all());
		 $usuario = $request['success'] ? $request['data'] : null;


		 session()->flash('success',[
			 'success' =>	$request['success'],
			 'messages' =>	$request['messages']
		 ]);

		 return redirect()->back();
    }

	public function edit($user){
		$user = $this->repository->find($user);
		$title = "Editar " . $user['firstname']. " " .$user['lastname']." - Stephenson";

		return view('admin.users.edit', [
      'title' => $title,
      'user' => $user
    ]);
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
		 $user = $request['success'] ? $request['data'] : null;

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
		 $user = $request['success'] ? $request['data'] : null;

		 session()->flash('success',[
			 'success' =>	$request['success'],
			 'messages' =>	$request['messages']
		 ]);

		 return redirect()->back();
    }
}
