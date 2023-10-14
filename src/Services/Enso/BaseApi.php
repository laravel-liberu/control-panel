<?php

namespace LaravelLiberu\ControlPanel\Services\Liberu;

use Illuminate\Http\Client\Response;
use LaravelLiberu\ControlPanel\Models\Application;
use LaravelLiberu\ControlPanel\Services\ApiResponse;

abstract class BaseApi extends ApiResponse
{
    private Api $api;

    public function __construct(Application $application, array $params)
    {
        $this->api = new Api($application, $params);
    }

    protected function call(string $method, string $uri): Response
    {
        return $this->api->call($method, $uri);
    }
}
