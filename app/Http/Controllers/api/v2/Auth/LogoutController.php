<?php

namespace App\Http\Controllers\api\v2\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\LogoutRequest;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function logout(LogoutRequest $request)
    {
        try {
            if (Auth::check()) {
                Auth::user()->currentAccessToken()->delete();
            }
            return response()->json('', 204);

        } catch (\Exception $e) {
            return response()->json('error_logout', 500);
        }
    }


}
