<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Brand;
use App\Cities;
use Response;
class SearchController extends Controller
{
	private $search;
	private $loc;
	private $min;
	private $max;
	public function index(Request $request)
    {
    	$this->search = $data['search'] = $request->get('s');
    	$this->loc = $data['loc'] = $request->get('loc')?$request->get('loc'):'';
    	$this->min = $data['min'] = $request->get('min')?$request->get('min'):0;
    	$this->max = $data['max'] = $request->get('max')?$request->get('max'):100000000;
    	$data['ads'] = Post::with(
        [
    		  'brand' => function ($query) { 
              $query->orWhere('brand', 'LIKE', '%'. $this->search. '%');
            },
    		  'city' => function ($query) { 
              $query->orWhere('city', 'LIKE', '%'. $this->search. '%')->where('city', 'LIKE', '%'. $this->loc. '%');
            }
        ]
    	)
      ->select('adprice','br_id','loc_id','postedby','adimgs','adtitle','adslug','selname','created_at')
      ->orWhere('adtitle', 'LIKE', '%'. $this->search. '%')
      ->where('adprice', '>=', $this->min)
      ->where('adprice', '<=', $this->max)
      ->orderBy('aid', 'DESC')
      ->paginate(20);

    	$data['min'] = $request->get('min');
    	$data['max'] = $request->get('max');

    	$data['params'] = array('loc' =>$data['loc'],'s' =>$data['search'],'min' =>$data['min'],'max' =>$data['max'], );
      return view('frontend.search',$data);
    }
    public function home(Request $request)
    {
        $search = $request->get('term');
      	$posts  = Post::select('adtitle as name')->where('adtitle', 'LIKE', '%'. $search. '%')->groupBy('adtitle')->orderBy('aid', 'DESC')->get()->toArray();
      	$brands = Brand::select('brand as name')->where('brand', 'LIKE', '%'. $search. '%')->get()->toArray();
      	$cities = Cities::select('city as name')->where('city', 'LIKE', '%'. $search. '%')->get()->toArray();
       	$result = array_merge($posts,$brands,$cities);
       	return response()->json($result);    
    }
    public function location(Request $request)
    {
        $search = $request->get('term');
      	$result = Cities::select('city as name')->where('city', 'LIKE', '%'. $search. '%')->get()->toArray();
     	return response()->json($result);    
    }
}
