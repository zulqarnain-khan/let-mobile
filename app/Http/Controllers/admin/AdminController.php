<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin;
use App\User;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Hash;
use Session;
use URl;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/index');
    }
    public function authentication(Request $request)
        {
            $user = Admin::where('email','=',$request->email)->first();
            if($user && Hash::make($request->password === $user['password']))
            {
                Session::put([
                        'id'=>$user['id'],
                        'name'=>$user['name'],
                        'email'=>$user['email']
                    ]);
                return response(['success' => true,'message' => 'Email and Password verified.You are Redirecting...'], Response::HTTP_OK);
            }
            return
                response([
                    'success' => false,
                    'message' => 'Email or Password is incorrect.'
                ], Response::HTTP_FORBIDDEN);
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function destroy(Request $request)
    {
        $request->session()->flush();
        $request->session()->regenerate();

        return redirect('admin/user/signin');
    }

    /*
    * Change User Status
    */
     public function changeUserActiveStatus(Request $request)
    {
       $user=User::find($request->user_id);
       $user->is_active=$request->active_status;
       $user->save();
       return response(["status"=>"success","message"=>"User Status changed Successfully"],Response::HTTP_OK);
    }
}
