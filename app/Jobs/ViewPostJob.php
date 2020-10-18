<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\ViewPostMail;
use Illuminate\Support\Facades\Mail;
use App\User;
use DB;


class ViewPostJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $user = null;
    public $post = null;
 
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user,$post)
    {  
        $this->user = $user;
        $this->post = $post;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {  
            $email = User::where('id',$this->user)->first('email');
            Mail::to($email->email)->send(new ViewPostMail($this->user,$this->post));
    }
}
