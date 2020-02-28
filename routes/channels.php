<?php

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

Broadcast::channel('App.User.{id}', function ($user, $id) {
    dd("hey2");
    return (int) $user->id === (int) $id;
});

Broadcast::channel('chat', function () {
    dd("hey3");
    return 'somedata';
});

Broadcast::channel('AdminDelete', function () {
    dd("hey1");
    return 'somedata1';
});

Broadcast::channel('user.{id}', function ($user, $id) {
    // dd("hey");
    // echo 'Channel' + $id;
    // return (int) $user->id === (int) $id;
    // return auth()->check();
    return true;
});
