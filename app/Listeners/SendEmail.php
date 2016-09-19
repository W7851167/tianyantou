<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use App\Mailer\ValidateMailer;

class SendEmail
{

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(ValidateMailer $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * Handle the event.
     *
     * @param  UserRegistered  $event
     * @return void
     */
    public function handle(ValidateMailer $event)
    {
        var_dump($event->user);exit;
        $this->mailer->welcome($event->user);
    }
}
