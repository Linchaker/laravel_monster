<?php


namespace App\Http\Controllers;


use App\Events\SimplePusherPrivateChannel;
use App\Models\Products\Warehouse;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TestSimplePusherPrivateChannelController extends Controller
{
    public function __invoke()
    {
        $warehousesProducts = Warehouse::first();
        $warehousesProducts->load('products');

        $user = User::first();

        SimplePusherPrivateChannel::dispatch($user, $warehousesProducts);

        return view('pusher_private', ['userId' => $user->id]);
    }
}
