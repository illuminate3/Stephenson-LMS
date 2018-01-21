<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Validators\UserValidator;
use Exception;
use Auth;
use App\Repositories\CourseRepository;
use App\Repositories\TutorialRepository;
use App\Repositories\PageRepository;

class DashboardController extends Controller{
	private $repository;
	private $validator;

	public function __construct(UserRepository $repository, UserValidator $validator)
	{
		$this->repository = $repository;
		$this->validator  = $validator;
	}
	
	public function index(CourseRepository $courseRepository, TutorialRepository $tutorialRepository, PageRepository $pageRepository){
		$users = $this->repository->all();
		$courses = $courseRepository->all();
		$tutorials = $tutorialRepository->all();
		$pages = $pageRepository->all();

		$title = "Dashboard - Escola LTG";
		echo view('admin/header', ['title' => $title]);
		echo view('admin/painel', ['courses' => $courses, 'users' => $users, 'pages' => $pages, 'tutorials' => $tutorials]);
		echo view('admin/footer');
	}
	
	public function settings(){
		$title = "Configurações Gerais - Escola LTG";
		echo view('admin/header', ['title' => $title]);
		echo view('admin/settings');
		echo view('admin/footer');
	}
	
	public function library(){
		$title = "Mídia - Escola LTG";
		echo view('admin/header', ['title' => $title]);
		echo view('admin/library');
		echo view('admin/footer');
	}
}
