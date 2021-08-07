<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $table = 'comments';
    public function posts(){

		return $this->belongsTo('App\Models\Post');

		//RElacion uno a muchos
		//Una categoría tiene muchos posts
	}
}
