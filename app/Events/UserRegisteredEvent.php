<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Support\Facades\DB;
use Log;
class UserRegisteredEvent extends Event implements ShouldBroadcast
{

    public $user;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {

        $data = DB::select("select * from members where lifestatus=1");
        if (sizeof($data) > 0) {
            Log::error("broadcastOn".sizeof($data));
        }
        return ['test-channel'];
    }
    public function broadcastWith(){
        return ['user' => '234234','user_id'=>1111];
    }
}
