<?php

namespace App\Actions\Reddit\Api;

use App\Models\User;
use Lorisleiva\Actions\Concerns\AsAction;

class GetToken
{
    use AsAction;

    public function handle($user_id, $reddit_auth_id)
    {

        $redditAuth = User::with('redditAuth')->find($user_id)->redditAuth->firstWhere('id', $reddit_auth_id);

        return $redditAuth->token;

    }
}
