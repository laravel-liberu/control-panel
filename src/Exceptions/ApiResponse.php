<?php

namespace LaravelLiberu\ControlPanel\Exceptions;

use LaravelLiberu\Helpers\Exceptions\LiberuException;

class ApiResponse extends LiberuException
{
    public static function error(int $code, string $message)
    {
        return new static($message, $code);
    }
}
