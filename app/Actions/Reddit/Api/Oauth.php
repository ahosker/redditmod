<?php

namespace App\Actions\Reddit\Api;

use Illuminate\Support\Facades\Http;
use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\Concerns\WithAttributes;

class Oauth
{
    use AsAction;
    use WithAttributes;

    //Set Input Rules
    public function rules()
    {
        return [
            'url' => ['required'],
            'token' => ['required'],
        ];
    }

    public function handle(array $attributes = []): \Illuminate\Support\Collection
    {
        //Fill Attributes
        $this->fill($attributes);

        //Execute
        return $this->execute();
    }

    private function execute(): \Illuminate\Support\Collection
    {
        //Validate Atributes
        $this->validateAttributes();

        //Make Request
        $response = $this->make_request();

        //Rate Limiting
        $this->rate_limit_check($response);

        //If not successful throw exception
        $this->error_check($response);

        //return collection
        return $response->collect();
    }

    private function make_request()
    {
        return Http::withToken($this->token)
            ->withHeaders(['User-Agent' => config('services.reddit.user_agent')])
            ->get(config('services.reddit.oauth_url').$this->url);

    }

    private function rate_limit_check($response): void
    {
        //Rate Limiting
        $rates['remaining'] = (int) $response->header('x-ratelimit-remaining');
        $rates['used'] = (int) $response->header('x-ratelimit-used');
        $rates['reset'] = (int) $response->header('x-ratelimit-reset');

        //If not successful throw exception
        if ($rates['remaining'] < 1) {
            abort(429, 'Reddit API rate limit reached.');
        }
    }

    private function error_check($response): void
    {
        //If not successful throw exception
        if (! $response->successful()) {
            $message = match ($response->status()) {
                403 => 'Reddit API forbids this request.',
                500 => 'Reddit API is down.',
                400 => 'Reddit API is down.',
                default => 'Unexpected status code: '.$response->status(),
            };
            //Throw an exception
            abort($response->status(), $message);
        }
    }
}
