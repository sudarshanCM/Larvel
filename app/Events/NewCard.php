<?php

namespace App\Events;
use App\CardContent;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewCard implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $card;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(CardContent $card)
    {
        $this->card = $card;
        // dd($card);
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */

    // public function broadcastOn()
    // {
    //     return ['my-channel'];
    // }
  
    // public function broadcastAs()
    // {
    //     return 'my-event';
    // }
    public function broadcastOn()
    {
        // dd("Channel created");
        return new Channel('posts');
    }

    public function broadcastWith(){
        return[
            'body' => $this->card->content,
            'created_at' =>$this->card->created_at,
        ];
    }
    public function broadcastAs() {
        return 'examplee';
    }
}
