<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Validators\UserValidator;
use App\Http\Controllers\Auth;
use Exception;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
	private $repository;
	private $validator;
	
	public function __construct(UserRepository $repository, UserValidator $validator)
	{
		$this->repository = $repository;
		$this->validator  = $validator;
	}
	public function homepage(){
		$title = "Escola LTG - Estudarn não precisa ser chato!";
		echo view('home', ['title' => $title]);
		echo view('footer');
	}
	
	public function cadastro(){
		$title = "Cadastro - Escola LTG";
		echo view('header', ['title' => $title]);
		echo view('cadastro');
		echo view('footer');
	}
	
	public function login(){
		$title = "Login - Escola LTG";
		echo view('header', ['title' => $title]);
		echo view('login');
		echo view('footer');
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
					return redirect()->route('perfil');
				}

			}

		} catch(Exception $e){
			return $e->getMessage();
		}
	}
	
	public function perfil(){
		$title = "Perfil - Escola LTG";
		echo view('header', ['title' => $title]);
		echo view('perfil');
		echo view('footer');
	}
	
	public function chat(){
		$title = "Chat - Escola LTG";
		echo view('header', ['title' => $title]);
		echo view('chat');
	}
}
