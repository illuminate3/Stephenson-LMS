<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Tutorial extends Model implements Transformable{
	
	use TransformableTrait;
	
	 public $timestamps = true;
	 protected $table = 'tutorials';
    protected $fillable = ['title','description','video_url','category','resume','author','thumbnail'];
	 protected $hidden = ['password', 'remember_token'];
	
	public function category(){
		return $this->belongsTo(Categories::class, 'category');
	}
	
	public function author(){
		return $this->belongsTo(User::class, 'author');
	}
}
