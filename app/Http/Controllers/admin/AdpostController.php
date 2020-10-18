<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use App\Post;

class AdpostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $data['ads'] = Post::with('brand','city')->select('adprice','br_id','loc_id','postedby','adimgs','adtitle','adslug','selname','created_at')->orderBy('aid', 'DESC')->get();

        return view('admin/adpost',$data);
    }
}
