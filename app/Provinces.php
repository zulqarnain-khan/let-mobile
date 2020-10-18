<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provinces extends Model
{
    public function cites(){
    	return $this->hasMany(Cities::class,'prov_id','proid');
    }
}
