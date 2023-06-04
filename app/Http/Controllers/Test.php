<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class Test extends Controller
{
    public function __invoke()
    {

        //$getToken = \App\Actions\Reddit\Api\GetToken::run();
        //dd($getToken);
        //--
        //$getRefreshToken = \App\Actions\Reddit\Api\GetRefreshToken::run();
        //dd($getRefreshToken);
        //--
        //$apiTokenRefresh = \App\Actions\Reddit\Api\TokenRefresh::run();
        //dd($apiTokenRefresh);
        //--
        //$apiOauth = \App\Actions\Reddit\Api\Oauth::run(['url' => 'api/v1/me']);
        //dd($apiOauth);
        //--
        //$apiMe = \App\Actions\Reddit\Api\Me::run();
        //dd($apiMe);
        //--
        //$apiListScopes = \App\Actions\Reddit\Api\ListScopes::run();
        //dd($apiListScopes);
        //--
        //$apiTokenRefresh = \App\Actions\Reddit\Api\TokenRefresh::run();
        //dd($apiTokenRefresh);
        //--
        //$apiSubredditReadNew = \App\Actions\Reddit\Api\SubredditReadNew::run(['subreddit' => 'ModSupport']);
        //dd($apiSubredditReadNew);
        //--
        //$apiMySubs = \App\Actions\Reddit\Api\MySubs::run();
        //dd($apiMySubs);
        //--
        //$apiMyKarma = \App\Actions\Reddit\Api\MyKarma::run();
        //dd($apiMyKarma);
        //--
        $user = Auth::user()->load(['redditAuth', 'redditAuth.subreddits']);

        //dd($user->redditAuth->first()->subreddits);

        dd($user->subreddits);
        //dd($user);
    }
}
