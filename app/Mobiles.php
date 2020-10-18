<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mobiles extends Model
{
    protected $primaryKey = 'mobile_id';
    public function brand(){
    	return $this->belongsTo(Brand::class,'brand_id','bid')->select(array('bid', 'brand','brandslug'));
    }
}
