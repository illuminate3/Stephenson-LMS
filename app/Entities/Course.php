<?php

namespace App\Entities;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Course extends Model{
    use Notifiable;
	
	 public $timestamps = true;
	 protected $table = 'courses';
    protected $fillable = ['title','description','category_id','resume','author_id','cover'];
	 protected $hidden = ['remember_token'];
	
	public function category(){
		return $this->belongsTo(Categories::class);
	}
	
	public function author(){
		return $this->belongsTo(User::class);
	}
	
	public function getModules(){
		return $this->hasMany(Module::class);
	}
}
