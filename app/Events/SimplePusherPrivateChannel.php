<?php

namespace App\Events;

use App\Models\Products\Product;
use App\Models\Products\Warehouse;
use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

/**
 * show user products
 *
 * Class SimplePusherPrivateChannel
 * @package App\Events
 */
class SimplePusherPrivateChannel implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user;
    public $warehousesProducts;
    public $other;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $user, $warehousesProducts)
    {
        $this->warehousesProducts = $warehousesProducts;
        $this->user = $user;
        $this->other = 123;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('warehouses-products-for-user.' . $this->user->id);
    }

    public function broadcastAs(): string
    {
        return 'warehouses.products.user';
    }
}
