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
use App\Repositories\CategoriesRepository;
use App\Validators\UserValidator;
use App\Services\UserService;
use Exception;
use Auth;


class ProfilesController{

    protected $service;
    protected $repository;
	 protected $validator;
	 protected $categories_repository;

    public function __construct(UserRepository $repository, UserValidator $validator, UserService $service, CategoriesRepository $categories){
        $this->repository 	= $repository;
        $this->service 		= $service;
        $this->validator 	= $validator;
        $this->categoriesRepository 	= $categories;
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
		echo view('profile.profile', ['user' => $perfil, 'isLoggedProfile' => $isLoggedProfile]);
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
	
 }