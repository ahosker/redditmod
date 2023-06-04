<?php

namespace App\Actions\Reddit\Api;

use Illuminate\Support\Facades\Http;
use Lorisleiva\Actions\Concerns\AsAction;

class TokenRefresh
{
    use AsAction;

    public function handle()
    {

        //http with post
        $request = Http::withBasicAuth(config('services.reddit.client_id'), config('services.reddit.client_secret'))
            ->asForm()
            ->post('https://www.reddit.com/api/v1/access_token', [
                'grant_type' => 'refresh_token',
                'refresh_token' => \App\Actions\Reddit\Api\GetRefreshToken::run(),
            ]);

        //Get Request Time plus enoch seconds
        try {
            $responceDate = \Carbon\Carbon::createFromFormat('D, d M Y H:i:s e', $request->header('date'));
        } catch (\Exception $e) {
            $responceDate = \Carbon\Carbon::now();
        }

        //Transform to object
        $object = $request->object();
        //Set to variables
        $accessToken = $object->access_token;
        $tokenType = $object->token_type;
        $expiresIn = $object->expires_in;
        $scope = $object->scope;
        $refreshToken = $object->refresh_token;
        //--
        $expiresAt = $responceDate->addSeconds($expiresIn);

        //TODO: Save to database

        return $accessToken;
    }
}
