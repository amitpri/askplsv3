<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PostReview extends Mailable
{
    use Queueable, SerializesModels;

    public $url;
    public $inptopicname;
    public $name; 

    public function __construct($url, $inptopicname, $name)
    {
        $this->url = $url;
        $this->inptopicname = $inptopicname;
        $this->name = $name; 
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.postreview');
    }
}
