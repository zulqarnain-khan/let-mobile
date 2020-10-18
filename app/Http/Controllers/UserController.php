<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\UserAuth;
use App\Http\Requests\resetPassword;
use App\User;
use DB;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Mailsender;
use Illuminate\Support\Facades\Crypt;
use Session;
use URl;
use Socialite;
use Exception;
class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }
    public function signup() { return view('frontend/signup'); }
    public function signin() { return view('frontend/login'); }
    public function forgetpassword() { return view('frontend/forgetpassword'); }
    public function changepassowrd($hash) 
        { 
            $email = Crypt::decrypt($hash);
            $reset = DB::table('password_resets')->where('email','=',$email)->first();
            if($reset) 
                {
                    return view('frontend/changepassword')->with('hash',$hash);
                }
            else
                {
                    Session::flash('message',"This link has been expired. Please send again."); 
                    return redirect('user/forget-password');
                }
        }
    public function authentication(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $authSuccess = Auth::attempt(['email' => $request->email, 'password' => $request->password, 'is_active' => 1]);

        if($authSuccess) {
            $request->session()->regenerate();
            User::where('email',$request->email)->update(['is_login'=> 1]);
            $user = User::where('email',$request->email)->first();
            Session::put([
                    'user_id'=>$user['id'],
                    'name'=>$user['fname'].' '.$user['lname'],
                    'email'=>$user['email'],
                    'phone'=>$user['phone'],
                    'slug'=>$user['usrslug'],
                    'image'=>$user['image'],
                ]);
            return response(['success' => true,'message' => 'Email and Password verified.You are Redirecting...'], Response::HTTP_OK);
        }
        return
            response([
                'success' => false,
                'message' => 'Email or Password is incorrect.'
            ], Response::HTTP_FORBIDDEN);
    }
    public function forget(Request $request)
    {
        $user = User::where('email',$request->email)->first();
        if($user) {
            $reset = DB::table('password_resets')->where('email',$request->email)->first();
            if($reset) 
            {
                return response([
                    'success' => false,
                    'message' => 'You already send request to change password Please check your mail Box.'
                ], Response::HTTP_FORBIDDEN);
            }
            else
            {
                $hash = Crypt::encrypt($request->email);
                DB::table('password_resets')->insert(array('email'=>$request->email,'token'=>$hash));
                Mailsender::forget_password($request->email);
                return response(['success' => true,'message' => '<strong>Sucess!</strong> We’ve sent you an email with activation link at the email address you provided. Please enjoy, and let us know if there’s anything else we can help you with. <br> <b> The Let Mobile Team <b>'], Response::HTTP_OK);
            }
        }
        return response([
                'success' => false,
                'message' => 'There is no user registered with this email address.'
            ], Response::HTTP_FORBIDDEN);
    }
    public function resetpassword(resetPassword $request, $hash)
    {
        $email = Crypt::decrypt($hash);
        $reset = DB::table('password_resets')->where('email','=',$email)->first();
        if($reset) 
        {
            User::where('email',$reset->email)->update(['password'=> Hash::make($request->password)]);
            DB::table('password_resets')->where('email',$reset->email)->delete();
            return response(['success' => true,'message' => 'Your Password has been changed You can Login now.'], Response::HTTP_OK);
        }
        else
        {
            return response([
                'success' => false,
                'message' => 'Something Went Wrong.'
            ], Response::HTTP_FORBIDDEN);
        }
    }
    public function logout(Request $request)
    {
        User::where('email',Session::get('email'))->update(['is_login'=> 0]);
        Auth::logout();
        $request->session()->flush();
        $request->session()->regenerate();

        return redirect('/');
    }
    public function register(UserAuth $request){

        $user= new User;
        $user->fname= $request->fname;
        $user->lname= $request->lname;
        $user->phone= $request->phone;
        $user->email= $request->email;
        $user->usrslug = $this->createSlug($request->fname.$request->lname);
        $user->password= Hash::make($request->password);
        if($user->save()){
            Mailsender::Email($request->email);
        }
        return 1;

    }  
    public function createSlug($title, $id = 0) {
        $slug = Str::slug($title, '-');
        $allSlugs = $this->getRelatedSlugs($slug, $id);
        if (! $allSlugs->contains('usrslug', $slug)){
            return $slug;
        }
        for ($i = 1; $i <= 10; $i++) {
            $newSlug = $slug.'-'.$i;
            if (! $allSlugs->contains('usrslug', $newSlug)) {
                return $newSlug;
            }
        }
        throw new \Exception('Can not create a unique slug');
    }
    protected function getRelatedSlugs($slug, $id = 0) {
        return User::select('usrslug')->where('usrslug', 'like', $slug.'%')
            ->where('id', '<>', $id)
            ->get();
    }
/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
      
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback(Request $request)
    {
        try {
                $user = Socialite::driver('google')->user();
                $finduser = User::where('google_id', $user->id)->first();
                if($finduser)
                    {
                        $credentials = $request->only('email', 'password');
                        $authSuccess = Auth::attempt(['email' => $finduser['email'], 'password' => '123456dummy', 'is_active' => 1]);
                        $request->session()->regenerate();
                        User::where('email',$finduser['email'])->update(['is_login'=> 1]);
                        Session::put([
                                'user_id'=>$finduser['id'],
                                'name'=>$finduser['fname'].' '.$finduser['lname'],
                                'email'=>$finduser['email'],
                                'phone'=>$finduser['phone'],
                                'slug'=>$finduser['usrslug'],
                                'image'=>$finduser['image'],
                            ]);
                        return redirect('/');
                    }
                    else
                    {
                        $name_f = ''; $name_l = ''; 
                        $name = explode(' ', $user->name);
                        if (isset($name[0])) {
                            $name_f = $name[0];
                        }
                        if (isset($name[1])) {
                            $name_l = $name[1];
                        }
                        $users= new User;
                        $users->fname= $name_f;
                        $users->lname= $name_l;
                        $users->email= $user->email;
                        $users->google_id= $user->id;
                        $users->is_active= 1;
                        $users->usrslug = $this->createSlug($name_f.$name_l);
                        $users->password= Hash::make('123456dummy');
                        $users->save();

                        $credentials = $request->only('email', 'password');
                        $authSuccess = Auth::attempt(['email' => $finduser['email'], 'password' => '123456dummy', 'is_active' => 1]);
                        $request->session()->regenerate();
                        User::where('email',$user->email)->update(['is_login'=> 1]);
                        Session::put([
                                'user_id'=>$users->id,
                                'name'=>$name_f.' '.$name_l,
                                'email'=>$user->email,
                                'phone'=>$user->phone,
                                'slug'=>$users->usrslug,
                                'image'=>$users->image
                            ]);
                        return redirect('/');
                    }
            } catch (Exception $e) {
                Session::flash('hasEmail',"Your Email is Already Exist. Please Login with Password"); 
                return redirect('user/signin');
            }
    }
    public function redirect($provider)
        {
            return Socialite::driver($provider)->redirect();
        }
    public function callback(Request $request,$provider)
        {
           $getInfo = Socialite::driver($provider)->user(); 
           $user = $this->createUser($getInfo,$provider); 
           $credentials = $request->only('email', 'password');
           $authSuccess = Auth::attempt(['email' => $user['email'],'password' => '123456dummy']);
           $request->session()->regenerate();
            User::where('id',$user['id'])->update(['is_login'=> 1]);
            Session::put([
                    'user_id'=>$user['id'],
                    'name'=>$user['fname'].' '.$user['lname'],
                    'email'=>$user['email'],
                    'phone'=>$user['phone'],
                    'slug'=>$user['usrslug'],
                    'image'=>$user['image'],
                ]);
           return redirect()->to('/');
        }
    function createUser($getInfo,$provider)
        {
            $user = User::where('facebook_id', $getInfo->id)->first();
            if (!$user) {
                $name_f = 'Jhon'; $name_l = 'Doe'; 
                $name = explode(' ', $getInfo->name);
                if (isset($name[0])) {
                    $name_f = $name[0];
                }
                if (isset($name[1])) {
                    $name_l = $name[1];
                }
                $user= new User;
                $user->fname= $name_f;
                $user->lname= $name_l;
                $user->email= $getInfo->email;
                $user->facebook_id= $getInfo->id;
                $user->is_active= 1;
                $user->usrslug = $this->createSlug($getInfo->name);
                $user->password= Hash::make('123456dummy');
                $user->save();
            }
            return $user;
         }
   
}
