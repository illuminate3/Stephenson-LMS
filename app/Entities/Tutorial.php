<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Tutorial extends Model implements Transformable{
	
	use TransformableTrait;
	
	 public $timestamps = true;
	 protected $table = 'tutorials';
    protected $fillable = ['title','description','video_url','time','category_id','resume','author_id','thumbnail'];
	 protected $hidden = ['password', 'remember_token'];
	
	public function category(){
		return $this->belongsTo(Categories::class);
	}
	
	public function author(){
		return $this->belongsTo(User::class);
	}
}
