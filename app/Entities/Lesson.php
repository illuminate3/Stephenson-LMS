<?php
namespace App\Entities;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Lesson extends Model{
    use Notifiable;
	
	 public $timestamps = true;
	 protected $table = 'lessons';
    protected $fillable = ['title','content','resume','video_url','course_id','module_id'];
	 protected $hidden = ['remember_token'];
	
	public function category(){
		return $this->belongsTo(Categories::class);
	}
	
	public function author(){
		return $this->belongsTo(User::class);
	}
}
