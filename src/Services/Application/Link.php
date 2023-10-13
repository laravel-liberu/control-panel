<?php

namespace LaravelLiberu\ControlPanel\Services\Application;

use LaravelLiberu\ControlPanel\Models\Application;
use LaravelLiberu\ControlPanelCommon\Contracts\Link as Contract;

class Link implements Contract
{
    public function __construct(private Application $application)
    {
    }

    public function id(): string
    {
        return 'site';
    }

    public function label(): string
    {
        return 'site';
    }

    public function url(): string
    {
        return $this->application->url;
    }

    public function tooltip(): ?string
    {
        return 'click to visit the live application';
    }

    public function icon(): array
    {
        return ['fab', 'enso'];
    }

    public function order(): int
    {
        return 100;
    }
}
