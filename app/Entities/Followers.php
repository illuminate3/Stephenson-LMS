<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Followers extends Model{
    protected $table = 'followers';
    protected $fillable = ['followed', 'follower'];
    public $timestamps = false;

    public function followerInfo(){
      return $this->belongsTo(User::class, 'follower', 'id');
    }

    public function followedInfo(){
      return $this->belongsTo(User::class, 'followed', 'id');
    }


}
