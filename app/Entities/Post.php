<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Post extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = ['title', 'content', 'resume', 'category_id', 'thumbnail', 'author_id'];
	
	public function category(){
		return $this->belongsTo(Categories::class);
	}
	
	public function author(){
		return $this->belongsTo(User::class);
	}
}
