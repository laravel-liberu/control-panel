<?php

namespace LaravelLiberu\ControlPanel\Exceptions;

use LaravelLiberu\Helpers\Exceptions\EnsoException;

class Gitlab extends EnsoException
{
    public static function unregistered()
    {
        return new static('The application is not registered on Gitlab');
    }
}
