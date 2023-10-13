<?php

namespace LaravelLiberu\ControlPanel\Services\Enso;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use LaravelLiberu\ControlPanel\Models\Application;
use LaravelLiberu\Helpers\Services\Obj;

class Api
{
    private Application $application;
    private Obj $params;

    public function __construct(Application $application, array $params)
    {
        $this->application = $application;
        $this->params = new Obj($params);
    }

    public function call(string $method, string $uri): Response
    {
        return Http::withHeaders($this->headers())
            ->{$method}($this->url($uri), $this->params());
    }

    private function url(string $uri): string
    {
        return "{$this->application->url}/{$uri}";
    }

    private function headers(): array
    {
        return ['Authorization' => "Bearer {$this->application->token}"];
    }

    private function params(): array
    {
        return $this->params->only(['startDate', 'endDate'])->toArray();
    }
}
