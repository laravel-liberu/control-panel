<?php

namespace LaravelLiberu\ControlPanel\Services\Gitlab;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;
use LaravelLiberu\ControlPanel\Models\Application;
use LaravelLiberu\ControlPanel\Services\ApiResponse;

class Api extends ApiResponse
{
    private int $id;
    private array $cache;

    public function __construct(Application $application)
    {
        $this->id = $application->gitlab_project_id;
        $this->cache = [];
    }

    public function project(): array
    {
        return $this->response('GET', "api/v4/projects/{$this->id}");
    }

    public function commits(): array
    {
        return $this->response('GET', "api/v4/projects/{$this->id}/repository/commits");
    }

    public function pipeline(): array
    {
        return $this->response('GET', "api/v4/projects/{$this->id}/pipelines");
    }

    protected function call(string $method, string $uri): Response
    {
        return $this->cache[$uri] ??= Http::withHeaders($this->headers())
            ->{$method}($this->url($uri), $this->params());
    }

    private function url(string $uri): string
    {
        return Config::get('enso.control-panel.gitlab.url')."/{$uri}";
    }

    private function headers(): array
    {
        return ['Private-Token' => Config::get('enso.control-panel.gitlab.token')];
    }

    private function params(): array
    {
        return [
            'page' => 1,
            'per_page' => 1,
        ];
    }
}
