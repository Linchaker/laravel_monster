<?php

use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

/*
 * The channel method accepts two arguments: the name of the channel and a callback which returns true or false
 * indicating whether the user is authorized to listen on the channel.
 */
//Broadcast::channel('five-dropped.{number}', function ($user, $number) {
//    return (int) $user->id === (int) $number;
//});

// public channel
Broadcast::channel('user.{userId}', function ($user, $userId) {
    return true;
});

// private channel
Broadcast::channel('warehouses-products-for-user.{userId}', function ($user, $userId) {
    return (int) $user->id !== (int) $userId;
});
