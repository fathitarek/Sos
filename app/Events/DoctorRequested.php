<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Doctor ;
use App\Patinet;

class DoctorRequested implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    
      public $doctor ;
      public $patient ;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Doctor $doctor , $patient)
    {
        $this->doctor = $doctor;
        $this->patient = $patient ;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel ('doctorRequested'. $this->doctor->id , $this->patient );
    }
}
