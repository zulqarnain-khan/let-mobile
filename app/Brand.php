<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public function post()
		{
		    return $this->hasMany('App\Post');
		}
}
