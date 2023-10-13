<?php

namespace LaravelLiberu\ControlPanel\Services\Envoyer;

use LaravelLiberu\ControlPanel\Models\Application;
use LaravelLiberu\ControlPanelCommon\Contracts\Link as Contract;

class Link implements Contract
{
    public function __construct(private Application $application)
    {
    }

    public function id(): string
    {
        return 'envoyer';
    }

    public function label(): string
    {
        return 'envoyer';
    }

    public function url(): string
    {
        return $this->application->envoyer_url;
    }

    public function tooltip(): ?string
    {
        return 'click to visit the Envoyer project';
    }

    public function icon(): array
    {
        return ['fad', 'rocket'];
    }

    public function order(): int
    {
        return 300;
    }
}
