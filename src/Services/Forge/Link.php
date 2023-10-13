<?php

namespace LaravelLiberu\ControlPanel\Services\Forge;

use LaravelLiberu\ControlPanel\Models\Application;
use LaravelLiberu\ControlPanelCommon\Contracts\Link as Contract;

class Link implements Contract
{
    public function __construct(private Application $application)
    {
    }

    public function id(): string
    {
        return 'forge';
    }

    public function label(): string
    {
        return 'forge';
    }

    public function url(): string
    {
        return $this->application->forge_url;
    }

    public function tooltip(): ?string
    {
        return 'click to visit the Forge project';
    }

    public function icon(): array
    {
        return ['fab', 'forge'];
    }

    public function order(): int
    {
        return 200;
    }
}
