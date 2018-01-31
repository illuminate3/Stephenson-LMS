<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model implements Transformable
{
    use TransformableTrait;
	 use SoftDeletes;

    protected $fillable = ['title','content','slug','author_id'];

}
