<?php

namespace App\Http\Controllers\api\v2\Auth;

use App\Http\Controllers\api\v2\APIController;
use App\Models\User;
use GuzzleHttp\Exception\ClientException;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends APIController
{
    /**
     * Redirect the user to the Provider authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider($provider)
    {

        $validated = $this->validateProvider($provider);
        if (!is_null($validated)) {
            return $validated;
        }


        return Socialite::driver($provider)->stateless()->redirect();
    }

    public function handleProviderCallback($provider)
    {
        $validated = $this->validateProvider($provider);
        if (!is_null($validated)) {
            return $validated;
        }

        try {
            $user = Socialite::driver($provider)->stateless()->user();
        } catch (ClientException $exception) {
            return response()->json(['error' => 'Invalid credentials provided'], 422);
        }

        $userCreated = User::firstOrCreate(
            [
                'email' => $user->getEmail(),
            ],
            [
                'email_verified_at' => now(),
                'name' => $user->getName(),
            ]
        );

        $userCreated->providers()->updateOrCreate(
            [
                'provider' => $provider,
                'provider_id' => $user->getId(),
            ],
            [
                'avatar' => $user->getAvatar(),
            ]
        );

        $token = $userCreated->createToken($user->getEmail())->plainTextToken;

        return response()->json(['token' => $token], 200);

    }

    protected function validateProvider($provider)
    {
        // hery delete github
        if (!in_array($provider, ['github', 'facebook', 'google', 'vkontakte'])) {
            return response()->json(['error' => 'Please login using facebook, google or vkontakte'], 422);
        }
    }
}
