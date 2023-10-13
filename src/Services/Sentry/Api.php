<?php

namespace LaravelLiberu\ControlPanel\Services\Sentry;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;
use LaravelLiberu\ControlPanel\Models\Application;
use LaravelLiberu\ControlPanel\Services\ApiResponse;

class Api extends ApiResponse
{
    private ?string $id;

    public function __construct(Application $application)
    {
        $this->id = $application->sentry_project_uri;
    }

    public function events(): array
    {
        return $this->response('GET', "api/0/projects/{$this->id}/stats/");
    }

    protected function call(string $method, string $uri): Response
    {
        return Http::withHeaders($this->headers())
            ->{$method}($this->url($uri));
    }

    private function url(string $uri): string
    {
        return Config::get('liberu.control-panel.sentry.url')."/{$uri}";
    }

    private function headers(): array
    {
        $token = Config::get('liberu.control-panel.sentry.token');

        return ['Authorization' => "Bearer {$token}"];
    }
}
