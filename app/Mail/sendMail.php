<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class sendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $details;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        //
        $this->details = $details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //return $this->subject('About New property')->view('mail_details');

        /*return $this->from('radha.gohil108@gmail.com')
            ->subject('About New property')
            ->view('mail_details')
            ->with('details',$this->details);*/
//        return $this->view('view.name');
        return $this->from('radha.tinnypixel@gmail.com')
            ->subject('About New property Submitted')
            ->view('frontend.pages.property-mail-detail')
            ->with('details',$this->details);
    }
}
