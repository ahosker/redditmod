<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class RedditLoginCreateOrAuth extends Controller
{
    public function __invoke(): RedirectResponse
    {
        //Try and catch error on InvalidStateException
        try {
            $reditUser = Socialite::driver('reddit')->user();
        } catch (\Laravel\Socialite\Two\InvalidStateException $e) {
            return redirect('/auth/redirect');
        } catch (\Exception $e) {
            return redirect('/auth/redirect');
        }

        //Get Response Date
        $responceDate = \Carbon\Carbon::now();

        //Logged in User
        if (Auth::check()) {
            $user = Auth::user();
        }

        if (! Auth::check()) {
            $user = User::whereHas('redditAuth', function ($query) use ($reditUser) {
                $query->where('reddit_id', $reditUser->id);
            })->firstOr(function () use ($reditUser) {
                return User::create([
                    'name' => $reditUser->nickname ?? $reditUser->name,
                    'email' => $reditUser->email ?? 'noemail@example.com',
                    'password' => Hash::make(Str::random(40)),
                ]);
            });

            Auth::login($user);
        }

        //Guest Without User Account

        //check if user is logged in
        if (Auth::check()) {
            $user = Auth::user();
        } else {
            return redirect()->route('login');
        }

        //Create Reddit Token
        $redditAuth = $user->redditAuth()->updateOrCreate([
            'reddit_id' => $reditUser->id,
        ], [
            'token' => $reditUser->token,
            'scope' => $reditUser->accessTokenResponseBody['scope'],
            'expires' => $responceDate->addSeconds($reditUser->expiresIn),
        ]);

        //Create Refresh Token
        $redditAuth->refreshToken()->updateOrCreate([
            'reddit_auth_id' => $redditAuth->id,
        ], [
            'refresh_token' => $reditUser->refreshToken,
            'expires' => $responceDate->addSeconds($reditUser->refreshTokenExpiresIn),
            'user_id' => $user->id,
        ]);

        //redirect to dashboard
        return redirect()->route('dashboard');

    }
}
