<?php

namespace App\Entities;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
	 use SoftDeletes;
    use Notifiable;
	
	 public $timestamps = true;
	 protected $table = 'users';
    protected $fillable = ['firstname', 'lastname', 'user','email','password','birth','gender'];
    protected $hidden = ['password', 'remember_token'];
}
