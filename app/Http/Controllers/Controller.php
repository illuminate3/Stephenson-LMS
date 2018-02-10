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
use App\Repositories\CourseRepository;
use App\Repositories\TutorialRepository;
use App\Repositories\LessonRepository;
use App\Repositories\CategoriesRepository;


class Controller extends BaseController{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	 protected $service;
    private $repository;
    private $categories_repository;
	 private $validator;

	public function __construct(UserRepository $repository, UserValidator $validator, UserService $service, CategoriesRepository $categories_repository){
		$this->repository = $repository;
		$this->validator  = $validator;
		$this->service 	= $service;
		$this->categoriesRepository 	= $categories_repository;
	}
	
	
	function logout(){
		auth()->logout();
		return redirect()->route('login');
	}

	
	public function login(){
		if(Auth::check()){
			return redirect()->route('dashboard.index');
		} else{
			echo view('login');	
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

	 
	 	
	public function register(CategoriesRepository $categories_repository){
		if(Auth::check()){
			return redirect()->route('home');
		} else{
			return view('register')->render();
		}
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
	
	public function homepage(CourseRepository $courseRepository, TutorialRepository $tutorialRepository, LessonRepository $lessonRepository){
		$users = $this->repository->all();
		$courses = $courseRepository->all();
		$tutorials = $tutorialRepository->all();
		$lessons = $lessonRepository->all();
		$categories = $this->categoriesRepository->getPrimaryCategories();
		
		$title = "Stephenson - Estudar não precisa ser chato!";
		echo view('home', ['title' => $title, 'courses' => $courses, 'users' => $users, 'lessons' => $lessons, 'tutorials' => $tutorials, 'categories' => $categories]);
	}
	
		
	public function userCourses(){
		$categories = $this->categoriesRepository->getPrimaryCategories();
		$user = $this->repository->find(Auth::user()->id);
		$courses = $user->getCourses;
		$loop = 'studying';
		
		$title = "Meus Cursos - Stephenson";
		echo view('header', ['title' => $title, 'categories' => $categories]);
		echo view('courses.user_courses',['courses' => $courses, 'loop' => $loop])->render();
		echo view('footer')->render();	
	}
	
	public function userFavoriteCourses(){
		$categories = $this->categoriesRepository->getPrimaryCategories();
		$user = $this->repository->find(Auth::user()->id);
		$courses = $user->getFavoriteCourses;
		$loop = 'favorites';
		
		$title = "Cursos Favoritos - Stephenson";
		echo view('header', ['title' => $title, 'categories' => $categories]);
		echo view('courses.user_courses',['courses' => $courses, 'loop' => $loop])->render();
		echo view('footer')->render();	
	}
}
