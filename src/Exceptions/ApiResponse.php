<?php

namespace LaravelLiberu\ControlPanel\Exceptions;

use LaravelLiberu\Helpers\Exceptions\EnsoException;

class ApiResponse extends EnsoException
{
    public static function error(int $code, string $message)
    {
        return new static($message, $code);
    }
}
