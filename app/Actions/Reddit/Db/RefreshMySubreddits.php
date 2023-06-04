<?php

namespace App\Actions\Reddit\Db;

use App\Actions\Reddit\Api\MySubs;
use App\Models\RedditAuthSubreddit;
use App\Models\Subreddits;
use App\Models\User;
use Auth;
use Lorisleiva\Actions\Concerns\AsAction;

class RefreshMySubreddits
{
    use AsAction;

    public function handle()
    {

        $redditAuth = User::with('redditAuth')->find(Auth::User()->id)->redditAuth;

        $redditAuth->each(function ($redditAuth) {
            $mySubs = MySubs::run(Auth::User()->id, $redditAuth->id);

            //Loop through each API Subreddit
            foreach ($mySubs as $subreddit) {
                //Insert API Subreddit into DB
                $subreddit = Subreddits::updateOrCreate(
                    [
                        'subreddit_id' => $subreddit->id,
                    ],
                    [
                        'display_name' => $subreddit->display_name,
                        'description' => $subreddit->description,
                        'title' => $subreddit->title,
                        'created' => $subreddit->created,
                        'header_title' => $subreddit->header_title,
                        'url' => $subreddit->url,
                    ]
                );

                RedditAuthSubreddit::updateOrCreate(
                    [
                        'reddit_auth_id' => $redditAuth->id,
                        'subreddits_id' => $subreddit->id,
                    ]
                );

            }

        });

    }
}
