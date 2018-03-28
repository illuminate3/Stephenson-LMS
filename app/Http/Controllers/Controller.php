<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Validators\UserValidator;
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
use Exception;
use Auth;
use Mail;

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

  public function error404(){
    return view('404', ['title' => "Erro 404 - Página não encontrada!"]);
  }

  public function search(Request $q){
    $title = "Resultados para: ". $q->q;
    return view('search', ['title' => $title]);
  }

	function logout(){
		auth()->logout();
		return redirect()->route('login');
	}


	public function login(){
		if(Auth::check()){
			return redirect()->route('dashboard.index');
		} else{
			return view('login', [
        'title' => "Login - Stephenson"
      ]);
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
					return redirect()->back();
				} elseif($user->password != $request->get('login_senha')){
						session()->flash('login_message',[
						 'success' =>	false,
						 'messages' =>	"Senha incorreta para esse e-mail"
					 ]);
					return redirect()->back();
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
      return view('register', [
        'title' => "Cadastro - Stephenson"
      ]);
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
		$title = "Stephenson - Plataforma EAD Open Source";

		return view('home', [
      'title' => $title,
      'courses' => $courses,
      'users' => $users,
      'lessons' => $lessons,
      'tutorials' => $tutorials,
    ]);
	}


	public function userCourses(){
		$user = $this->repository->find(Auth::user()->id);
		$courses = $user->getCourses;
		$loop = 'studying';
		$title = "Meus Cursos - Stephenson";

		return view('courses.user_courses',[
      'title' => $title,
      'user' => $user,
      'courses' => $courses,
      'loop' => $loop
    ]);
	}

	public function userFavoriteCourses(){
		$user = $this->repository->find(Auth::user()->id);
		$courses = $user->getFavoriteCourses;
		$loop = 'favorites';
		$title = "Cursos Favoritos - Stephenson";

		return view('courses.user_courses',[
      'title' => $title,
      'courses' => $courses,
      'loop' => $loop
    ]);
	}

  public function sendEmail(Request $request){
    $this->validate($request, [
			'name' => 'required',
			'email' => 'required|email',
			'subject' => 'min:1',
			'message' => 'min:10']);

		$news = (isset($request->news)) ? true : false;

		switch($request->subject){
			case(1):
				$subject = "Ajuda";
				break;
			case(2):
				$subject = "Dúvida";
				break;
			default:
				$subject = "Outro";
		}
		$data = array(
			'name' => $request->name,
			'email' => $request->email,
			'subject' => $subject,
			'news' => $news,
			'bodyMessage' => $request->message
			);

		Mail::send('emails.contact', $data, function($message) use ($data){
			$message->from($data['email']);
			$message->to('contato@stephenson-lms.com');
			$message->subject($data['subject']);
		});

    session()->flash('success',[
			'success' =>	true,
			'messages' => "E-mail enviado com sucesso"
		]);

		return redirect()->back();
  }
}
