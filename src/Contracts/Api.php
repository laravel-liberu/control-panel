<?php

namespace LaravelLiberu\ControlPanel\Contracts;

interface Api
{
    public function response(string $method, string $uri): array;
}
