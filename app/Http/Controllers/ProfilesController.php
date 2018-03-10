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
use App\Validators\UserValidator;
use App\Services\UserService;
use App\Entities\User;
use Exception;
use Auth;
use Image;

class ProfilesController{

    protected $service;
    protected $repository;
	  protected $validator;

    public function __construct(UserRepository $repository, UserValidator $validator, UserService $service){
        $this->repository 			= $repository;
        $this->service 					= $service;
        $this->validator 				= $validator;
    }

	public function perfil(Request $request, $username){
    $user = new User();
		$profile = $user->where('user', $username)->first();
    $activities = $profile->getActivities;

    if(Auth::check()){
		    $isLoggedProfile = ($profile->id == Auth::user()->id) ? true : false;
    } else{
      $isLoggedProfile = false;
    }
		$title = $profile['firstname'] . " " . $profile['lastname'] . " - Feed";
		return view('profile.profile', [
      'title' => $title,
      'user' => $profile,
      'activities' => $activities,
      'isLoggedProfile' => $isLoggedProfile
    ]);
	}

	public function perfil_about(Request $request, $profile){
		$profile = $this->repository->getProfileInfo($profile);
    if(Auth::check()){
		    $isLoggedProfile = ($profile->id == Auth::user()->id) ? true : false;
    } else{
      $isLoggedProfile = false;
    }

		$title = $profile['firstname'] . " " . $profile['lastname'] . " - Feed";

		return view('profile.about', ['title' => $title, 'user' => $profile, 'isLoggedProfile' => $isLoggedProfile]);
	}

  public function update_profile(Request $request){
    $locale = ['locale' => serialize(['country' => $request->country, 'state' => $request->state, 'city' => $request->city])];
    $request = $this->service->update($request->all() + $locale, Auth::user()->id);
    $user = $request['success'] ? $request['data'] : null;
    session()->flash('success',[
      'success' =>	$request['success'],
      'messages' =>	$request['messages']
    ]);

    return redirect()->back();
  }

  public function update_avatar(Request $request){
    if($request->hasFile('avatar')){
      $avatar = $request->file('avatar');
      $filename = time() . '.' . $avatar->getClientOriginalExtension();
      Image::make($avatar)->resize(300,300)->save(public_path('/uploads/avatars/' . $filename));
      $request = $this->service->update(['avatar' => $filename], Auth::user()->id);
      $user = $request['success'] ? $request['data'] : null;
      session()->flash('success',[
        'success' =>	$request['success'],
        'messages' =>	$request['messages']
      ]);
  }
    return redirect()->back();
  }

	public function perfil_followers(Request $request, $profile){
		$profile = $this->repository->getProfileInfo($profile);
    if(Auth::check()){
		    $isLoggedProfile = ($profile->id == Auth::user()->id) ? true : false;
    } else{
      $isLoggedProfile = false;
    }
		$title = $profile['firstname'] . " " . $profile['lastname'] . " - Feed";

		return view('profile.followers', ['title' => $title, 'user' => $profile, 'isLoggedProfile' => $isLoggedProfile]);
	}

	public function perfil_following(Request $request, $profile){
		$profile = $this->repository->getProfileInfo($profile);
    if(Auth::check()){
		    $isLoggedProfile = ($profile->id == Auth::user()->id) ? true : false;
    } else{
      $isLoggedProfile = false;
    }
		$title = $profile['firstname'] . " " . $profile['lastname'] . " - Feed";

		return view('profile.following', ['title' => $title, 'user' => $profile, 'isLoggedProfile' => $isLoggedProfile]);
	}

 }
