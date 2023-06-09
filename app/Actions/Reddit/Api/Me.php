<?php

namespace App\Actions\Reddit\Api;

use Lorisleiva\Actions\Concerns\AsAction;

class Me
{
    use AsAction;

    public function handle()
    {
        return Oauth::make()->set('url', 'api/v1/me')->handle();
    }
}
