<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $primaryKey = 'blog_id';
    public function category(){
    	return $this->belongsTo(BlogCategory::class,'category_id','category_id')->select(array('category_id', 'category_name'));
    }
}
