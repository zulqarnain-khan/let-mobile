<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\PostMail;
use Illuminate\Queue\SerializesModels;
use App\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use DB;

class adPostMail implements ShouldQueue
{
   use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $user = null;
    public $slug = null;
 
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user,$slug)
    {  
        $this->slug = $slug;
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {  
            $email = Crypt::encrypt($this->user);
            $url   = url('/')."/".$this->slug;
            Mail::to($this->user)->send(new PostMail($url));
        
    }
}
