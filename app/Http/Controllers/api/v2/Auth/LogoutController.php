<?php

namespace App\Http\Controllers\api\v2\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\LogoutRequest;

class LogoutController extends Controller
{
    /**
     * @OA\Get(
     *      path="/auth/logout",
     *      operationId="v2_logout",
     *      tags={"Auth"},
     *      summary="Logout",
     *      description="Returns nothing",
     *      @OA\Response(response=204, description="Successful operation"),
     *      @OA\Response(response=500, description="Server errors"),
     *      security={
     *           {"Authorization": {}}
     *      }
     * )
     * Logout / delete token
     * @param LogoutRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(LogoutRequest $request)
    {
        try {
            if (auth('sanctum')->check()) {
                auth('sanctum')->user()->currentAccessToken()->delete();
            }
            return response()->json('', 204);

        } catch (\Exception $e) {
            return response()->json('error_logout', 500);
        }
    }


}
