<?php

namespace Innovaware\Exceptions;

use Illuminate\Support\Facades\Mail;

class EmailSender
{
    public static function sendErrorEmail($error)
    {
        Mail::send('emails::emails.error', ['error' => $error], function ($message) {
            $message->to('support@innovaware.nl')->subject('Foutmelding');
        });
    }
}
