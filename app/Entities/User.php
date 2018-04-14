<?php

namespace App\Entities;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable{
	use SoftDeletes;
  use Notifiable;

	public $timestamps = true;
	protected $table = 'users';
  protected $fillable = ['firstname', 'lastname', 'user','email', 'password','sex', 'born', 'locale', 'avatar', 'permission'];
  protected $hidden = ['remember_token'];

	public function getCourses(){
		$instance = $this->hasMany(CoursesMeta::class)->where('type','=', 2);
    	return $instance;
	}

	public function getFavoriteCourses(){
		$instance = $this->hasMany(CoursesMeta::class)->where('type','=', 1);
    	return $instance;
	}

	public function getActivities(){
		$instance = $this->hasMany(UserActivities::class)->orderBy('created_at', 'desc');
		return $instance;
	}

	public function getFollowed(){
		return $this->hasMany(Followers::class, 'follower');
	}

	public function getFollower(){
		return $this->hasMany(Followers::class, 'followed');
	}

	public function getBirthAttribute(){
		$birth = explode('-',$this->attributes['birth']);

		if(count($birth) != 3){
			return NULL;
		} else{
		$birth = $birth[2] . "/" . $birth[1] . "/" . $birth[0];
		return $birth;
			}
	}

	public function getGenderAttribute(){
		$gender = $this->attibutes['gender'];
		if($gender == 1){
			return "Feminino";
		} elseif($gender == 2){
			return "Masculino";
		} else{
			return NULL;
		}
	}

}
