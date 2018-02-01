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
    protected $fillable = ['firstname', 'lastname', 'user','email','password','birth','gender'];
    protected $hidden = ['password', 'remember_token'];
	
	public function getCourses(){
		return $this->hasMany(CoursesMeta::class);
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