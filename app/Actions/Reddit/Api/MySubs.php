<?php

namespace App\Actions\Reddit\Api;

use App\Actions\Reddit\Api\Oauth as OauthAction;
use App\Models\User;
use Lorisleiva\Actions\Concerns\AsAction;

class MySubs
{
    use AsAction;

    private $oauth;

    public function __construct(OauthAction $oauth)
    {
        $this->oauth = $oauth;
    }

    public function handle($user_id, $reddit_auth_id)
    {
        try {
            // API: https://www.reddit.com/dev/api/#GET_subreddits_mine_moderator
            $response = $this
                ->oauth
                ->set('url', 'subreddits/mine/moderator')
                ->set('user_id', $user_id)
                ->set('reddit_auth_id', $reddit_auth_id)
                ->handle();

            // Filter to data
            $subreddits = $this->filterToData($response);

            // Filter non user subreddits
            $subreddits = $this->removeUserSubreddits($subreddits);

            return (object) $this->convertToObect($subreddits);

        } catch (\Exception $e) {
            return;
        }

    }

    private function convertToObect($subreddits)
    {
        return array_map(function ($subreddit) {
            return (object) $subreddit;
        }, $subreddits);
    }

    private function filterToData($response)
    {
        return array_column($response['data']['children'], 'data');
    }

    private function removeUserSubreddits($request)
    {
        return array_filter($request, function ($subreddit) {
            return $subreddit['subreddit_type'] !== 'user';
        });
    }
}
