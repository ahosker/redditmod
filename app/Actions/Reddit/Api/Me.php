<?php

namespace App\Actions\Reddit\Api;

use Lorisleiva\Actions\Concerns\AsAction;

class Me
{
    use AsAction;

    public function handle()
    {

        $request = Oauth::make()
            ->set('url', 'api/v1/me')
            ->set('token', 'eyJhbGciOiJSUzI1NiIsImtpZCI6IlNIQTI1NjpzS3dsMnlsV0VtMjVmcXhwTU40cWY4MXE2OWFFdWFyMnpLMUdhVGxjdWNZIiwidHlwIjoiSldUIn0.eyJzdWIiOiJ1c2VyIiwiZXhwIjoxNjg1NzIwNjI2LjgyNTM1NSwiaWF0IjoxNjg1NjM0MjI2LjgyNTM1NCwianRpIjoiMFN6SjNlNFJOcXVhM2o1YkxqQUJNMmFPMTBvNFp3IiwiY2lkIjoiYzRTOWUwLW4zTDhtT1dGN3BfVWlldyIsImxpZCI6InQyXzRtdzNhIiwiYWlkIjoidDJfNG13M2EiLCJsY2EiOjEyOTI3NzE2MzMyMTIsInNjcCI6ImVKeUtWc3BNU2MwcnlTeXBWSW9GQkFBQV9fOGNMd1JuIiwiZmxvIjo4fQ.CyZPUH8HH_p6cPnZcpBxapZyh7LFy-YInM1ct45vwrIp0UVZ-_SrXjEBE4bxvRLlb-J9UmQBIQkvuBeZDW_SZVPD3iEJs3o6xJ4nMAxv86VGnVnq3etvRXQutBwY2cYwPwo79hdwXJHS886rIcP5D88qpNJGiUiM-5DyP3ufZMbcrEoRnpXyyTdh_EYrfYv7VHs4lvTnRCwUTUWCgJ-d5YbGML5D5XBesvy3D0Hw_WWAKl-5TnEBh1cffuD-sslf2xa3BacZD_pUj3tBGcet3k09s3KHvfyovKOWtBLoPynuXNdXZQd6xpAOUdNYzG1aOh8ctxYtZIiVVTeX3nJ-qw')
            ->handle();

        return $request;
    }

    public function asController()
    {
        $article = $this->handle();

        //return $article;

        dd($article);
    }
}
