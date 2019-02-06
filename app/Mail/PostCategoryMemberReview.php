<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PostCategoryMemberReview extends Mailable
{
    use Queueable, SerializesModels;

    public $url;
    public $inptopicname;
    public $name; 
    public $topic_type; 

    public function __construct($url, $inptopicname, $name, $topic_type)
    {
        $this->url = $url;
        $this->inptopicname = $inptopicname;
        $this->name = $name; 
        $this->topic_type = $topic_type;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.postcategorymemberreview');
    }
}
