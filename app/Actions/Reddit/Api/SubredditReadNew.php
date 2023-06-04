<?php

namespace App\Actions\Reddit\Api;

use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\Concerns\WithAttributes;

class SubredditReadNew
{
    use AsAction;
    use WithAttributes;

    public function rules()
    {
        return [
            'subreddit' => ['required'],
        ];
    }

    public function handle(array $attributes = []): \Illuminate\Support\Collection
    {
        //Fill Attributes
        $this->fill($attributes);

        //Execute
        return $this->execute();
    }

    public function execute()
    {
        //TODO: Set up rate limiting
        //TODO: Set up Last Request Time & send asking for updates
        return Oauth::make()->set('url', 'r/'.$this->subreddit.'/new')->handle();
    }
}
