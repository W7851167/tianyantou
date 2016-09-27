<?php

namespace App\Events;

use App\Models\UserModel;
use Illuminate\Queue\SerializesModels;

class ValidateEmail extends Event
{
    use SerializesModels;

    public $params;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($params)
    {
        $this->params = $params;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
