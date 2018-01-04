<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Validators\UserValidator;
use Exception;
use Auth;
use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Services\UserService;

class Controller extends BaseController{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	 protected $service;
    private $repository;
	private $validator;

	
	public function __construct(UserRepository $repository, UserValidator $validator, UserService $service){
		$this->repository = $repository;
		$this->validator  = $validator;
		$this->service 	= $service;
	}
	public function homepage(){
		$title = "Escola LTG - Estudar não precisa ser chato!";
		echo view('home', ['title' => $title]);
	}
	
	public function criarConta(){
		if(Auth::check()){
			return redirect()->route('home');
		} else{
			$title = "Cadastro - Escola LTG";
			echo view('header', ['title' => $title])->render();
			echo view('cadastro')->render();
			echo view('footer')->render();
		}
	}
	
    public function store(UserCreateRequest $request){
		 $request = $this->service->store($request->all());
		 $usuario = $request['success'] ? $request['data'] : null;
		 
		 
		 session()->flash('success',[
			 'success' =>	$request['success'],
			 'messages' =>	$request['messages']
		 ]);
		 
		 return redirect()->route('signup'); 
    }

	
	public function login(){
		if(Auth::check()){
			return redirect()->route('home');
		} else{
			$title = "Login - Escola LTG";
			echo view('header', ['title' => $title]);
			echo view('login');
			echo view('footer');
		}
	}
	
	function logout(){
		auth()->logout();
		return redirect()->route('login');
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
					return redirect()->route('login_form');
				} elseif($user->password != $request->get('login_senha')){
						session()->flash('login_message',[
						 'success' =>	false,
						 'messages' =>	"Senha incorreta para esse e-mail"
					 ]);
					return redirect()->route('login_form');
				} else{
					\Auth::login($user);
					return redirect()->route('home');
				}

			}

		} catch(Exception $e){
			return $e->getMessage();
		}
	}
	
	public function perfil(Request $request, $perfil){
		$title = $perfil . " - Escola LTG";
		echo view('header', ['title' => $title]);
		echo view('profile/perfil', ['user' => $perfil]);
		echo view('footer');
	}
	
	public function perfil_about(Request $request, $perfil){
		$title = $perfil . " - Escola LTG";
		echo view('header', ['title' => $title]);
		echo view('profile/about', ['user' => $perfil]);
		echo view('footer');
	}
	
	public function perfil_followers(Request $request, $perfil){
		$title = $perfil . " - Escola LTG";
		echo view('header', ['title' => $title]);
		echo view('profile/followers', ['user' => $perfil]);
		echo view('footer');
	}
	
	public function perfil_following(Request $request, $perfil){
		$title = $perfil . " - Escola LTG";
		echo view('header', ['title' => $title]);
		echo view('profile/following', ['user' => $perfil]);
		echo view('footer');
	}
	
	public function perfil_settings(Request $request, $perfil){
		$title = $perfil . " - Escola LTG";
		echo view('header', ['title' => $title]);
		echo view('profile/settings', ['user' => $perfil]);
		echo view('footer');
	}
		
	
	public function chat(){
		$title = "Chat - Escola LTG";
		echo view('header', ['title' => $title]);
		echo view('chat');
	}
}
