<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Email extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public function __construct($content,$title)
    {
        $this->content = $content;
        $this->title = $title;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
       $content=$this->content;
        return $this->markdown('emails.email')
            ->subject($this->title)
            ->with(compact('content'));
    }
}
