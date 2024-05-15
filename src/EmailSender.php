<?php

namespace Innovaware\Exceptions;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class EmailSender
{
    public static function reportError($error)
    {
        if (env('INNOVAWARE_APP_KEY') != null) {}
        $errorObj = [
            "file" => $error->getFile(),
            "line" => $error->getLine(),
            "code" => $error->getCode(),
            "message" => $error->getMessage(),
            "trace" => $error->getTraceAsString(),
            "APP_ENV" => env('APP_ENV'),
        ];

        $promise = Http::async()->post('https://portaal.innovaware.nl/webhooks/app/aken/exception', ['error' => json_encode($errorObj)])
            ->then(function ($response) {
            });

        $promise->wait();
    }

}
