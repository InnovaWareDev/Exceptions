<?php

namespace Innovaware\Exceptions;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class EmailSender
{
    public static function reportError($error)
    {
        $promise = Http::async()->post('https://portaal.innovaware.nl/webhooks/app/aken/exception', ['error' => $error])
            ->then(function ($response) {
            echo "Response received!";
            dd($response, $response->body());
            echo $response->body();
        });
    }

}
