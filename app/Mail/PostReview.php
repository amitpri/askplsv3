<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PostReview extends Mailable
{
    use Queueable, SerializesModels;

    public $inptopicid;
    public $inptopicname;
    public $name;
    public $inpreview;

    public function __construct($inptopicid, $inptopicname, $name, $inpreview)
    {
        $this->inptopicid = $inptopicid;
        $this->inptopicname = $inptopicname;
        $this->name = $name;
        $this->inpreview = $inpreview;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
    //    return $this->view('emails.postreview');
    }
}
