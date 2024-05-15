<?php

namespace Innovaware\Exceptions;

use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class EmailSender
{
    public static function reportError($error)
    {
        if (env('INNOVAWARE_APP_KEY') != null) {
            $errorObj = [
                "file" => $error->getFile(),
                "line" => $error->getLine(),
                "code" => $error->getCode(),
                "message" => $error->getMessage(),
                "trace" => $error->getTraceAsString(),
                "ip" => request()->ip(),
                "browser" => request()->userAgent(),
                "route" => request()->route(),
                "url" => request()->url(),
                "has_session" => request()->hasSession(),
                "user" => auth()->user(),
                "method" => \request()->method(),
                "accept_content_type" => request()->header('Accept'),
                "language_preference" => request()->header('Accept-Language'),
                "query_parameters" => request()->query(),
                "cookies" => request()->cookie(),
                "uploaded_file" => request()->file('upload'),
                "session_data" => request()->session()->all(),
                "json_data" => request()->json()->all(),
                "request_headers" => request()->header(),
                "request_parameters" => request()->input(),
                "server_environment" => $_SERVER,
                "APP_ENV" => env('APP_ENV'),
            ];

            $promise = Http::async()->post('https://portaal.innovaware.nl/webhooks/app/aken/exception', ['error' => json_encode($errorObj)])
                ->then(function ($response) {
                });

            $promise->wait();
        }

    }

}
