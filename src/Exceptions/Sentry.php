<?php

namespace LaravelLiberu\ControlPanel\Exceptions;

use LaravelLiberu\Helpers\Exceptions\LiberuException;

class Sentry extends LiberuException
{
    public static function unregistered()
    {
        return new static('The application is not registered on Sentry');
    }
}
