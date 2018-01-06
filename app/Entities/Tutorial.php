<?php

namespace App\Entities;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Tutorial extends Model {
    use Notifiable;
	
	 public $timestamps = true;
	 protected $table = 'tutorials';
    protected $fillable = ['title','description','video_url','resume','author','thumbnail'];
	 protected $hidden = ['password', 'remember_token'];

}
