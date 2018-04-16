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
use Illuminate\Support\Facades\DB;
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

  /* PROFILE PAGES */

	public function profile(Request $request, $profile){
    $profile = $this->repository->getProfileInfo($profile);
    $activities = $profile->user->getActivities;

    return view('profile.profile', ['user' => $profile,'activities' => $activities,]);
	}

	public function profile_about(Request $request, $profile){
		$profile = $this->repository->getProfileInfo($profile);

		return view('profile.about', ['user' => $profile]);
	}

  public function profile_followers(Request $request, $profile){
    $profile = $this->repository->getProfileInfo($profile);

		return view('profile.followers', ['user' => $profile]);
	}

	public function profile_following(Request $request, $profile){
		$profile = $this->repository->getProfileInfo($profile);

		return view('profile.following', ['user' => $profile]);
	}

  /* PROFILE ACTIONS */

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

  public function follow_user(Request $request){
    $follow_action = DB::table('followers');
    $follower = Auth::user()->id;
    $followed = $request->user;

    $isFollowing = $follow_action->where('followed', $followed)->where('follower', $follower)->first();

    if(is_null($isFollowing)){
      $data = ['follower' => $follower, 'followed' => $followed];
      $follow_action->insert($data);
    } else{
      $follow_action->where('id', $isFollowing->id)->delete();
    }

    return redirect()->back();
  }

 }
