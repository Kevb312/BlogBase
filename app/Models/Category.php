<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
	public function posts(){

		return $this->hasMany('App\Models\Post');

		//RElacion uno a muchos
		//Una categoría tiene muchos posts
	}
    
}
