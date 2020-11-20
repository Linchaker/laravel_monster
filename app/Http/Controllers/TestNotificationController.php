<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestNotificationController extends Controller
{
    public function index(User $model)
    {
        $users = $model->getUsersWithNotif();
        $userId = Auth::id();
        return view('push.notif', ['users' => $users, 'userId' => $userId]);
    }
}
