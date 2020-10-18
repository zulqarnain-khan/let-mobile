<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;
use App\Mobiles;
use App\Brand;
use App\Post;

class NewMobileController extends Controller
{
    public function show(Mobiles $mobile,$slug)
    {
        $data['mobile'] = Mobiles::with('brand')->select('mobile_title','mobile_description','brand_id','short_description','mobile_slug','mobile_image','created_at')->where('mobile_slug','=',$slug)->first();
        if (isset($data['mobile']->mobile_title)) {
        	$data['ads'] = Post::with('brand','city')->select('adprice','br_id','loc_id','postedby','adimgs','adtitle','adslug','selname')->where('br_id',$data['mobile']->brand_id)->take(20)->orderBy('aid', 'DESC')->get();
            $data['mobiles'] = Mobiles::with('brand')->select('mobile_title','short_description','mobile_slug','mobile_image','created_at')->where('mobile_slug','!=',$slug)->orderBy('mobile_id', 'DESC')->take(5)->get();
            return view('frontend.mobile',$data);
        }
        return abort(404); 
    }
}
