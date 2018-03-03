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
use App\Repositories\UserActivitiesRepository;
use App\Validators\UserValidator;
use App\Services\UserService;
use Exception;
use Auth;


class ProfilesController{

    protected $service;
    protected $repository;
	 protected $validator;

    public function __construct(UserRepository $repository, UserActivitiesRepository $user_activities_repository, UserValidator $validator, UserService $service){
        $this->repository 						= $repository;
        $this->userActivitiesRepository 	= $user_activities_repository;
        $this->service 							= $service;
        $this->validator 						= $validator;
    }

	public function perfil(Request $request, $perfil){
		$perfil = $this->repository->getProfileInfo($perfil);
		$isLoggedProfile = ($perfil->id == Auth::user()->id) ? true : false;
		$title = $perfil['firstname'] . " " . $perfil['lastname'] . " - Feed";
		$activities = $this->userActivitiesRepository->findWhere(['user_id' => $perfil->id])->all();

		echo view('profile.profile', ['title' => $title, 'user' => $perfil, 'isLoggedProfile' => $isLoggedProfile, 'activities' => $activities]);
	}

	public function perfil_about(Request $request, $perfil){
		$perfil = $this->repository->getProfileInfo($perfil);
		$isLoggedProfile = ($perfil->id == Auth::user()->id) ? true : false;
		$title = $perfil['firstname'] . " " . $perfil['lastname'] . " - Feed";

		echo view('profile.about', ['title' => $title, 'user' => $perfil, 'isLoggedProfile' => $isLoggedProfile]);
	}

	public function perfil_followers(Request $request, $perfil){
		$perfil = $this->repository->getProfileInfo($perfil);
		$isLoggedProfile = ($perfil->id == Auth::user()->id) ? true : false;
		$title = $perfil['firstname'] . " " . $perfil['lastname'] . " - Feed";

		echo view('profile.followers', ['title' => $title, 'user' => $perfil, 'isLoggedProfile' => $isLoggedProfile]);
	}

	public function perfil_following(Request $request, $perfil){
		$perfil = $this->repository->getProfileInfo($perfil);
		$isLoggedProfile = ($perfil->id == Auth::user()->id) ? true : false;
		$title = $perfil['firstname'] . " " . $perfil['lastname'] . " - Feed";

		echo view('profile.following', ['title' => $title, 'user' => $perfil, 'isLoggedProfile' => $isLoggedProfile]);
	}

 }
