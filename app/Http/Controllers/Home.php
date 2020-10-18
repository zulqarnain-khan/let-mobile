<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdateUser;
use App\Http\Requests\ChangePassword;
use Image;
use Intervention\Image\Exception\NotReadableException;
use App\User;
use App\Brand;
use App\Cities;
use App\Post;
use Session;
use Redirect;
class Home extends Controller
{
    public function __construct()
    {
        if (Auth::guest()) { 
            return redirect('user/signin');
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug)
    {
            $data['user'] = User::where('usrslug','=',$slug)->first();
            $data['published'] = Post::where('postedby','=', Session::get('user_id'))->count();
            $data['unverified'] = Post::where('postedby','=', Session::get('user_id'))->where('is_verified','=',0)->count();
            $data['deleted'] = Post::where('postedby','=', Session::get('user_id'))->where('vcode','=',1)->count();
            $data['sold'] = Post::where('postedby','=', Session::get('user_id'))->where('is_sold','=',1)->count();
            return view('frontend.user.home',$data); 

    }
    public function unverified($slug)
    {

        $data['user'] = User::where('usrslug','=',$slug)->first();
        $data['published'] = Post::where('postedby','=', Session::get('user_id'))->count();
        $data['unverified'] = Post::where('postedby','=', Session::get('user_id'))->where('is_verified','=',0)->count();
        $data['sold'] = Post::where('postedby','=', Session::get('user_id'))->where('is_sold','=',1)->count();
         $data['deleted'] = Post::where('postedby','=', Session::get('user_id'))->where('vcode','=',1)->count();
        $data['ads'] = Post::where('postedby','=', Session::get('user_id'))->where('is_verified','=',0)->orderBy('aid', 'DESC')->paginate(5);
        return view('frontend.user.ads',$data); 
    }
    public function solded($slug)
    {

        $data['user'] = User::where('usrslug','=',$slug)->first();
        $data['published'] = Post::where('postedby','=', Session::get('user_id'))->count();
        $data['unverified'] = Post::where('postedby','=', Session::get('user_id'))->where('is_verified','=',0)->count();
        $data['sold'] = Post::where('postedby','=', Session::get('user_id'))->where('is_sold','=',1)->count();
         $data['deleted'] = Post::where('postedby','=', Session::get('user_id'))->where('vcode','=',1)->count();
        $data['ads'] = Post::where('postedby','=', Session::get('user_id'))->where('is_sold','=',1)->orderBy('aid', 'DESC')->paginate(5);
        return view('frontend.user.ads',$data); 
    }
    public function deleted($slug)
    {

        $data['user'] = User::where('usrslug','=',$slug)->first();
        $data['published'] = Post::where('postedby','=', Session::get('user_id'))->count();
        $data['unverified'] = Post::where('postedby','=', Session::get('user_id'))->where('is_verified','=',0)->count();
        $data['sold'] = Post::where('postedby','=', Session::get('user_id'))->where('is_sold','=',1)->count();
         $data['deleted'] = Post::where('postedby','=', Session::get('user_id'))->where('vcode','=',1)->count();
        $data['ads'] = Post::where('postedby','=', Session::get('user_id'))->where('vcode','=',1)->orderBy('aid', 'DESC')->paginate(5);
        return view('frontend.user.ads',$data); 
    }
    public function published($slug)
    {

        $data['user'] = User::where('usrslug','=',$slug)->first();
        $data['published'] = Post::where('postedby','=', Session::get('user_id'))->count();
        $data['unverified'] = Post::where('postedby','=', Session::get('user_id'))->where('is_verified','=',0)->count();
        $data['sold'] = Post::where('postedby','=', Session::get('user_id'))->where('is_sold','=',1)->count();
        $data['deleted'] = Post::where('postedby','=', Session::get('user_id'))->where('vcode','=',1)->count();
        $data['ads'] = Post::withCount('postview')->where('postedby','=', Session::get('user_id'))->orderBy('aid', 'DESC')->paginate(5);

        return view('frontend.user.ads',$data); 
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function marksold(Request $reuest,$id)
    {
        $user = Post::find($id);
        $user->is_sold = 1;
        $user->save();
        return redirect()->back();
    }
    public function delete(Request $reuest,$id)
    {
        $user = Post::find($id);
        $user->vcode = 1;
        $user->save();
        return redirect()->back();
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
    public function edit($slug,$id)
    {
        $data['item'] = Post::with('brand','city')->where('aid','=', $id)->first();
        if ($data['item']) {            
            $data['brands'] = Brand::get();
            $data['cities'] = Cities::get();
            return view('frontend.user.edit',$data);
        }
        else
        {
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUser $request, $id)
    {
        $user = User::find($id);
        $user->fname= $request->fname;
        $user->lname= $request->lname;
        $user->phone= $request->phone;
        $user->save();
        Session::put('name',$request->fname.' '.$request->lname);
        return 1;
    }
    public function changePassowrd(ChangePassword $request, $id)
    {
        $count = User::where('id','=',$id)->where('password','=', Hash::make($request->oldpassword))->count();
        if ($count > 0) {
            $user = User::find($id);
            $user->password= Hash::make($request->newpassword);
            $user->save();
            return 1;
        }
        else {
            return response()->json(['errors' => ["Your old Passowrd is inccorect."]], Response::HTTP_FORBIDDEN);
        }
    }
    public function profile(Request $request,$id)
    {
        $item = $request->file('profile');
        if ($request->hasFile('profile')) :
            $ImageUpload = Image::make($item);

            $originalPath = 'public/profiles/';
            $ImageUpload->resize(150,150);
            $ImageName = time().'-'.$item->getClientOriginalName();
            $ImageUpload->save($originalPath.$ImageName);
        else:
            $ImageName = '';
        endif;
        $user = User::find($id);
        if ($user->image !== null) {
            unlink('public/profiles/'.$user->image);
        }
        $user->image= $ImageName;
        $user->save();
        Session::put(['image'=>$ImageName]);
        return response(['success' => true,'image' => url('public/profiles/'.$ImageName)], Response::HTTP_OK);
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
