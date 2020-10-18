<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Crypt;
use App\Postview;
use DB;

use App\Jobs\RegisterUserEmail;
use App\Jobs\forgetUserPassword;
use App\Jobs\adPostMail;
use App\Jobs\ViewPostJob;
use App\Jobs\ContactMailJob;

use App\Mail\RegisterUsers;
use App\Mail\PostMail;
use App\Mail\ViewPostMail;
use App\Mail\ContactMail;

use App\User;


class Mailsender extends Controller
{
    public static function Email($email) {
        RegisterUserEmail::dispatch($email)->delay(now()->addSeconds(1));
    }
    public static function forget_password($email) {
        forgetUserPassword::dispatch($email)->delay(now()->addSeconds(1));
    }
    public function verify($hash) {
    	$email = Crypt::decrypt($hash);
    	$valid = User::where('email',$email)->get();
    	if(sizeof($valid) == 0){
    		Session::flash('message',"Your account has not been verified. Something went wrong.Please contact <a href='".url('user/signin')."' class='btn btn-info'> Let Mobile Support </a>"); 
    	}
    	else {
    		User::where('email',$email)->update(['is_active'=> 1]);
    		Session::flash('message',"Your account has been verified. Now You can post free ads at Let Mobile after Login.");
            return redirect('user/signin');
    	}
    }
    public static function PostEmail($email,$slug){
        adPostMail::dispatch($email,$slug)->delay(now()->addSeconds(1));       
    }
    public static function PostView($post,$count) {
        ViewPostJob::dispatch($post,$count)->delay(now()->addSeconds(1));
    }
    public static function ContactMail($user){
        ContactMailJob::dispatch($user)->delay(now()->addSeconds(1));
    }
}
