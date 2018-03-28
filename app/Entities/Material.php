<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Material.
 *
 * @package namespace App\Entities;
 */
class Material extends Model
{
  public $timestamps = true;
	protected $table = 'materials';
	protected $fillable = ['meta','type','title'];

	public function lesson(){
		return $this->belongsTo(Lesson::class);
	}

}
