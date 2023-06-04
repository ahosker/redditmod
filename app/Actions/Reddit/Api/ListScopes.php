<?php

namespace App\Actions\Reddit\Api;

use Lorisleiva\Actions\Concerns\AsAction;

class ListScopes
{
    use AsAction;

    public function handle()
    {
        return Oauth::make()->set('url', 'api/v1/scopes')->handle();
    }
}
