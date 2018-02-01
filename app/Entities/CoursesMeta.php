<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class CoursesMeta extends Model implements Transformable{
    use TransformableTrait;

    protected $table = 'courses_meta';
    protected $fillable = ['user_id', 'course_id'];

}
