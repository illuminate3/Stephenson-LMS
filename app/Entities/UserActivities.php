<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class UserActivities extends Model{
	 public $timestamps = true;
	 protected $table = 'user_activities';
   protected $fillable = ['type','user_id', 'relation', 'data'];
}
