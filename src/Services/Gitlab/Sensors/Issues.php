<?php

namespace LaravelLiberu\ControlPanel\Services\Gitlab\Sensors;

use LaravelLiberu\ControlPanel\Contracts\Api;
use LaravelLiberu\ControlPanelCommon\Contracts\Sensor;
use LaravelLiberu\ControlPanelCommon\Services\IdProvider;

class Issues extends IdProvider implements Sensor
{
    public function __construct(private Api $api)
    {
    }

    public function value(): mixed
    {
        return $this->api->project()['open_issues_count'];
    }

    public function tooltip(): string
    {
        return 'open issues';
    }

    public function icon(): array
    {
        return ['fad', 'exclamation-circle'];
    }

    public function class(): ?string
    {
        return null;
    }

    public function order(): int
    {
        return 200;
    }
}
