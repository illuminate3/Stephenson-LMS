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
use App\Repositories\CategoriesRepository;
use App\Validators\UserValidator;
use App\Services\UserService;
use Exception;
use Auth;


class UsersController extends Controller {

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
         $users = $this->repository->all();
		 	$title = "Usuários - Escola LTG";
		 
			echo view('admin.header',['title' => $title]);
			echo view('admin.users.index', ['users' => $users]);
			echo view('admin.footer');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  UserCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
	
	 public function create(){
		 $title = "Adicionar Usuário - Escola LTG";
		 
		 echo view('admin.header', ['title' => $title])->render();
		 echo view('admin.users.create')->render();
		 echo view('admin.footer')->render();
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

		$title = "Editar " . $user['firstname'].$user['lastname']." - Escola LTG";
		echo view('admin.header', ['title' => $title]);
		echo view('admin.users.edit', ['user' => $user])->render();
		echo view('admin.footer')->render();
	}

    /**
     * Update the specified resource in storage.
     *
     * @param  UserUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(UserUpdateRequest $request, $id){

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $user = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'User updated.',
                'data'    => $user->toArray(),
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
    public function destroy($id){
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'User deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'User deleted.');
    }
	
	function logout(){
		auth()->logout();
		return redirect()->route('login');
	}

	
	public function login(){
		if(Auth::check()){
			return redirect()->route('dashboard.index');
		} else{
			echo view('admin/login');	
		}
		
	}
	
	public function auth(Request $request){
		$rememberme = false;
		if(isset($_POST['login_rememberme'])){$rememberme=true;}
		
		$data=[
			'email'=> $request->get('login_email'),
			'password'=> $request->get('login_senha')
		];
		
		try{
			if(env('PASSWORD_HASH')){
				\Auth::attempt($data,$rememberme);
			} else{
				$user = $this->repository->findWhere(['email' => $request->get('login_email')])->first();
				
				if(!$user){
					session()->flash('login_message',[
						 'success' =>	false,
						 'messages' =>	"Nenhuma conta associada a este e-mail"
					 ]);
					return redirect()->route('admin.login_form');
				} elseif($user->password != $request->get('login_senha')){
						session()->flash('login_message',[
						 'success' =>	false,
						 'messages' =>	"Senha incorreta para esse e-mail"
					 ]);
					return redirect()->route('admin.login_form');
				} else{
					\Auth::login($user);
					return redirect()->route('dashboard.index');
				}

			}

		} catch(Exception $e){
			return $e->getMessage();
		}
	}
	
	
		
	public function userLogin(CategoriesRepository $categories_repository){
		if(Auth::check()){
			return redirect()->route('home');
		} else{
			$this->categoriesRepository 	= $categories_repository;
		   $categories = $this->categoriesRepository->getPrimaryCategories();
			$title = "Login - Escola LTG";
			echo view('header', ['title' => $title, 'categories' => $categories]);
			echo view('login');
			echo view('footer');
		}
	}
	
	public function userAuth(Request $request){
		$rememberme = false;
		if(isset($_POST['login_rememberme'])){$rememberme=true;}
		
		$data=[
			'email'=> $request->get('login_email'),
			'password'=> $request->get('login_senha')
		];
		
		try{
			
			if(env('PASSWORD_HASH')){
				\Auth::attempt($data,$rememberme);
			} else{
				$user = $this->repository->findWhere(['email' => $request->get('login_email')])->first();
				
				if(!$user){
					session()->flash('login_message',[
						 'success' =>	false,
						 'messages' =>	"Nenhuma conta associada a este e-mail"
					 ]);
					return redirect()->route('login_form');
				} elseif($user->password != $request->get('login_senha')){
						session()->flash('login_message',[
						 'success' =>	false,
						 'messages' =>	"Senha incorreta para esse e-mail"
					 ]);
					return redirect()->back();
				} else{
					\Auth::login($user);
					return redirect()->route('home');
				}

			}

		} catch(Exception $e){
			return $e->getMessage();
		}
	}
	
		
    public function userStore(UserCreateRequest $request){
		 $request = $this->service->store($request->all());
		 $usuario = $request['success'] ? $request['data'] : null;
		 
		 
		 session()->flash('success',[
			 'success' =>	$request['success'],
			 'messages' =>	$request['messages']
		 ]);
		 
		 return redirect()->back(); 
    }
	 
	 	
	public function userCreate(CategoriesRepository $categories_repository){
		if(Auth::check()){
			return redirect()->route('home');
		} else{
			$this->categoriesRepository 	= $categories_repository;
			$categories = $this->categoriesRepository->getPrimaryCategories();
			
			$title = "Cadastro - Escola LTG";
			echo view('header', ['title' => $title,'categories' => $categories])->render();
			echo view('cadastro')->render();
			echo view('footer')->render();
		}
	}

}
