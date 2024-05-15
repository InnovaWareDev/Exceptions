<?php

namespace Innovaware\Exceptions;

class Greet
{
    public function greet(String $sName)
    {
        return 'Hi ' . $sName . '! How are you doing today?';
    }

}
