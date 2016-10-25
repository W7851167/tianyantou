<?php

namespace App\Listeners;

use App\Events\ValidateEmail;
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
     * @param  UserRegistered $event
     * @return void
     */
    public function handle(ValidateEmail $event)
    {
        $params = $event->params;
        if (isset($params['type']) && $params['type'] == 'find') {
            $this->mailer->find($params);
        } else {
            $this->mailer->welcome($params);
        }
    }
}
