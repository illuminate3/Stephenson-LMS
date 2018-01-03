<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Validators\UserValidator;
use App\Http\Controllers\Auth;
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
	
	public function admin_login(){
		echo view('admin/login');
	}
	
	function logout(){
		auth()->logout();
		return redirect()->route('dashboard.index');
	}
	
	public function admin_auth(Request $request){
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
	
	public function index(){
		echo view('admin/header');
		echo view('admin/painel');
		echo view('admin/footer');
	}
}
