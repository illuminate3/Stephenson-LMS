<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Module extends Model{
	 protected $table = 'modules';
    protected $fillable = ['name','course_id'];
	 protected $hidden = ['remember_token'];
	
	 public function getLessons(){
		 return $this->hasMany(Lesson::class);
	 }
}
