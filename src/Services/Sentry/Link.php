<?php

namespace LaravelLiberu\ControlPanel\Services\Sentry;

use Illuminate\Support\Facades\Config;
use LaravelLiberu\ControlPanel\Models\Application;
use LaravelLiberu\ControlPanelCommon\Contracts\Link as Contract;

class Link implements Contract
{
    public function __construct(private Application $application)
    {
    }

    public function id(): string
    {
        return 'sentry';
    }

    public function label(): string
    {
        return 'sentry';
    }

    public function url(): string
    {
        return  Config::get('enso.control-panel.sentry.url')
            ."/{$this->application->sentry_project_uri}";
    }

    public function tooltip(): ?string
    {
        return 'click to visit the Sentry project';
    }

    public function icon(): array
    {
        return ['fad', 'bug'];
    }

    public function order(): int
    {
        return 500;
    }
}
