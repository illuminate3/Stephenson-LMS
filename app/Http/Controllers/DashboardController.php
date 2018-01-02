<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Validators\UserValidator;
use Exception;

class DashboardController extends Controller
{
	private $repository;
	private $validator;
	
	public function __construct(UserRepository $repository, UserValidator $validator)
	{
		$this->repository = $repository;
		$this->validator  = $validator;
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
					throw new Exception("E-mail não existente");
				} elseif($user->password != $request->get('login_senha')){
					throw new Exception("Senha incorreta");
				} else{
					\Auth::login($user);
					return redirect()->route('user.dashboard');
				}

			}

		} catch(Exception $e){
			return $e->getMessage();
		}
	}
	
	public function index(){
		echo view('admin/header');
		echo view('admin/painel');
	}
}
