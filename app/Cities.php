<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{
     public function post()
		{
		    return $this->hasMany('App\Post');
		}
	public function province(){
    	return $this->belongsTo(Provinces::class,'proid','prov_id')->select(array('province'));
    }
}
