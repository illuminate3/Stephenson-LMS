<?php

namespace App\Entities;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Categories extends Model {
    use Notifiable;
	
	 public $timestamps = true;
	 protected $table = 'categories';
    protected $fillable = ['name','color','level'];
	 protected $hidden = ['remember_token'];
}
