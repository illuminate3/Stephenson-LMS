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
    protected $fillable = ['title','description','category','resume','author','thumbnail'];
	 protected $hidden = ['remember_token'];
	
	public function courseCategory(){
		return $this->belongsTo(Categories::class, 'category');
	}
	
	public function courseAuthor(){
		return $this->belongsTo(User::class, 'author');
	}
}
