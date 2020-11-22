<?php

namespace App\Http\Controllers\api\v2\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * @OA\Post(
     *      path="/auth/login",
     *      operationId="v2_login",
     *      tags={"Auth"},
     *      summary="Login",
     *      description="Returns token",
     *      @OA\Response(response=200, description="successful auth"),
     *      @OA\Response(response=401, description="Unauthorized"),
     *      @OA\Response(response=422, description="Validation errors"),
     *      @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/LoginRequest")
     *     ),
     *
     *     )
     * Handle the incoming request.
     *
     * @param LoginRequest $request
     * @return \Illuminate\Http\Response
     */
    public function login(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['error' => __('auth.failed')], 401);
        }

        $token = $user->createToken($request->email)->plainTextToken;

        return response()->json(['token' => $token], 200);
    }
}
