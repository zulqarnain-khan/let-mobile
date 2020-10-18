<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Cities;
use App\Provinces;
use App\Http\Controllers\Controller;

class locationsController extends Controller
{
    public function index()
    {
        $data['countries'] = DB::table('countries')->orderBy('country', 'Asc')->get();

        $data['provinces'] = Provinces::get();
        $data['cities'] = Cities::with('province')->get();
        
        return view('admin.alllocations',$data);
    }
}
