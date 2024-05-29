<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class OAuthCallbackController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(string $provider)
    {
        $providerUser = Socialite::driver($provider)->user();

        $user = User::firstWhere('email', $providerUser->getEmail());

        $message = "You are now logged in. This window should be closed automatically. Otherwise, please close this window.";

        if ($user) {
            $message = "This email is already registered. This window should be closed automatically. Otherwise, please close this window.";
        } else {
            $user = User::create([
                'email' => $providerUser->getEmail(),
                'provider' => $provider,
                'provider_id' => $providerUser->getId(),
                'provider_token' => $providerUser->token,
                'provider_refresh_token' => $providerUser->refreshToken,
                'name' => $providerUser->getName(),
                'email_verified_at' => now(),
            ]);
        }

        Auth::login($user);

        return inertia('Auth/Close', [
            'message' => $message
        ]);
    }
}
