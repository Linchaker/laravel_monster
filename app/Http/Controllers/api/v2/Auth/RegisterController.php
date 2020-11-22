<?php

namespace App\Http\Controllers\api\v2\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * @OA\Post(
     *      path="/auth/register",
     *      operationId="v2_register",
     *      tags={"Auth"},
     *      summary="Registration",
     *      description="Returns token",
     *      @OA\Response(response=200, description="successful operation"),
     *      @OA\Response(response=422, description="Validation errors"),
     *      @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/RegisterRequest")
     *     ),
     * )
     * Handle the incoming request.
     *
     * @param RegisterRequest $request
     * @return \Illuminate\Http\Response
     */
    public function register(RegisterRequest $request)
    {
        $user = User::create([
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $token = $user->createToken($request->email)->plainTextToken;

        return response()->json(['token' => $token], 201);
    }
}
