<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class PusherEvent extends Event implements  ShouldBroadcast
{
    use SerializesModels;
    public $text,$id;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($text,$id)
    {
        $this->text = $text;
        $this->id = $id;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return ['laravel-broadcast-channel'];
    }
}
