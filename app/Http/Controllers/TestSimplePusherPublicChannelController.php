<?php


namespace App\Http\Controllers;


use App\Events\SimplePusherPublicChannel;
use Illuminate\Support\Facades\Auth;

class TestSimplePusherPublicChannelController extends Controller
{
    public function __invoke()
    {
        $user = Auth::user();

        SimplePusherPublicChannel::dispatch($user);

        return view('pusher', ['userId' => $user->id]);
    }
}
