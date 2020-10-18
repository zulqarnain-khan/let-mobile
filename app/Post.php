<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $primaryKey = 'aid';
	
    public function brand(){
    	return $this->belongsTo(Brand::class,'br_id','bid')->select(array('bid', 'brand','brandslug'));
    }
    public function city(){
    	return $this->belongsTo(Cities::class,'loc_id','ctid')->select(array('ctid', 'city','cityslug'));
    }
    public function postview(){
    	return $this->hasMany(Postview::class,'post_id','aid');
    }
   public function user(){
        return $this->belongsTo(User::class,'postedby','id');
    }
}
