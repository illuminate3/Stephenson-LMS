<?php
namespace App\Entities;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class LessonsMeta extends Model{
	use Notifiable;

	public $timestamps = true;
	protected $table = 'lessons_meta';
	protected $fillable = ['lesson_id','type','title','content'];
	
	public function lesson(){
		return $this->belongsTo(Lesson::class);
	}
}
