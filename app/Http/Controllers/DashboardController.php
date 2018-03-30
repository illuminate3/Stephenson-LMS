<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Validators\UserValidator;
use App\Repositories\CourseRepository;
use App\Repositories\TutorialRepository;
use App\Repositories\CommentRepository;
use Exception;
use Auth;

class DashboardController{
	private $repository;
	private $validator;

	public function __construct(UserRepository $repository, UserValidator $validator){
		$this->repository = $repository;
		$this->validator  = $validator;
	}

	public function index(CourseRepository $courseRepository, TutorialRepository $tutorialRepository,CommentRepository $commentRepository){
		$users = $this->repository->all();
		$courses = $courseRepository->all();
		$tutorials = $tutorialRepository->all();
		$comments = $commentRepository->all();
		$title = "Dashboard - Stephenson";

		return view('admin.dashboard.index', [
			'title' => $title,
			'courses' => $courses,
			'users' => $users,
			'comments' => $comments,
			'tutorials' => $tutorials
		]);
	}

	public function library(){
		$title = "Mídia - Stephenson";

		return view('admin.library.index', [
			'title' => $title
		]);
	}
}
