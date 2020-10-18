<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\InterestedRequest;
use App\Interested;
use Illuminate\Support\Facades\Session;

class InetrestedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InterestedRequest $request, $to_id)
    {
        $int = Interested::where('to_id',$to_id)->where('from_id',Session::get('user_id'))->first();
        if($int) {
            return 1;
        }
        else
        {  
            $int= new Interested;
            $int->email= $request->email;
            $int->phone= $request->phone;
            $int->to_id= $to_id;
            $int->from_id= Session::get('user_id');
            if($int->save()){
                //Mailsender::Email($request->email);
            }
            return 1;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
