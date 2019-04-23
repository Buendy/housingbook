<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SuccessfullyRent extends Mailable
{
    use Queueable, SerializesModels;

    private $user;
    private $apartment;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $apartment)
    {
        $this->user = $user;
        $this->apartment = $apartment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.successfully_rent')->with('user', $this->user)
            ->with('apartment', $this->apartment)->subject(__('mail'));
    }
}
