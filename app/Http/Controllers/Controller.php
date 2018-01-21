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
	
	public function homepage(CourseRepository $courseRepository, TutorialRepository $tutorialRepository, LessonRepository $lessonRepository){
		$users = $this->repository->all();
		$courses = $courseRepository->all();
		$tutorials = $tutorialRepository->all();
		$lessons = $lessonRepository->all();
		$categories = $this->categoriesRepository->getPrimaryCategories();
		
		$title = "Escola LTG - Estudar não precisa ser chato!";
		echo view('home', ['title' => $title, 'courses' => $courses, 'users' => $users, 'lessons' => $lessons, 'tutorials' => $tutorials, 'categories' => $categories]);
	}
	
	public function perfil(Request $request, $perfil){
		$perfil = $this->repository->getProfileInfo($perfil);
		$categories = $this->categoriesRepository->getPrimaryCategories();
		
		
		if($perfil->id == Auth::user()->id){
			$isLoggedProfile = true;
		} else{
			$isLoggedProfile = false;
		}
		
		$title = $perfil['firstname'] . " " . $perfil['lastname'] . " - Feed";
		
		echo view('header', ['title' => $title, 'categories' => $categories]);
		echo view('profile/perfil', ['user' => $perfil, 'isLoggedProfile' => $isLoggedProfile]);
		echo view('footer');
	}
	
	public function perfil_about(Request $request, $perfil){
		$perfil = $this->repository->getProfileInfo($perfil);
		$categories = $this->categoriesRepository->getPrimaryCategories();
		$title = $perfil['firstname'] . " " . $perfil['lastname'] . " - Sobre";		
		
		if($perfil->id == Auth::user()->id){
			$isLoggedProfile = true;
		} else{
			$isLoggedProfile = false;
		}
		
		echo view('header', ['title' => $title, 'categories' => $categories]);
		echo view('profile/about', ['user' => $perfil, 'isLoggedProfile' => $isLoggedProfile]);
		echo view('footer');
	}
	
	public function perfil_followers(Request $request, $perfil){
		$perfil = $this->repository->getProfileInfo($perfil);
		$categories = $this->categoriesRepository->getPrimaryCategories();
		$title = $perfil['firstname'] . " " . $perfil['lastname'] . " - Seguidores";		
		
		if($perfil->id == Auth::user()->id){
			$isLoggedProfile = true;
		} else{
			$isLoggedProfile = false;
		}
		
		echo view('header', ['title' => $title, 'categories' => $categories]);
		echo view('profile/followers', ['user' => $perfil, 'isLoggedProfile' => $isLoggedProfile]);
		echo view('footer');
	}
	
	public function perfil_following(Request $request, $perfil){
		$perfil = $this->repository->getProfileInfo($perfil);
		$categories = $this->categoriesRepository->getPrimaryCategories();
		$title = $perfil['firstname'] . " " . $perfil['lastname'] . " - Seguindo";		
		
		if($perfil->id == Auth::user()->id){
			$isLoggedProfile = true;
		} else{
			$isLoggedProfile = false;
		}
		
		echo view('header', ['title' => $title, 'categories' => $categories]);
		echo view('profile/following', ['user' => $perfil, 'isLoggedProfile' => $isLoggedProfile]);
		echo view('footer');
	}
	
	public function perfil_settings(Request $request, $perfil){
		$perfil = $this->repository->getProfileInfo($perfil);
		$categories = $this->categoriesRepository->getPrimaryCategories();
		$title = $perfil['firstname'] . " " . $perfil['lastname'] . " - Configurações";		
		
		if($perfil->id == Auth::user()->id){
			$isLoggedProfile = true;
		} else{
			$isLoggedProfile = false;
		}
		
		echo view('header', ['title' => $title, 'categories' => $categories]);
		echo view('profile/settings', ['user' => $perfil, 'isLoggedProfile' => $isLoggedProfile]);
		echo view('footer');
	}
		
	
	public function chat(){
		$title = "Chat - Escola LTG";
		$categories = $this->categoriesRepository->getPrimaryCategories();
		echo view('header', ['title' => $title, 'categories' => $categories]);
		echo view('chat');
	}
}
