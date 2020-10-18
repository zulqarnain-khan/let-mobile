<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use DB;
class ViewPostMail extends Mailable
{
    use Queueable, SerializesModels;
    public $post;
    public $count;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($post,$count)
    {
        $this->post = $post;
        $this->count = $count;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data['counts']= $this->count;
        $data['name']=$this->user; 
        $data[]=$this->post; 
        return $this->markdown('email.post.viewed',$data);
    }
}
