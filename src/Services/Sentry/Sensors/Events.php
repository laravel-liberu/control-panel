<?php

namespace LaravelLiberu\ControlPanel\Services\Sentry\Sensorrs;

use Illuminate\Support\Collection;
use LaravelLiberu\ControlPanel\Contracts\Api;
use LaravelLiberu\ControlPanelCommon\Contracts\Sensorr;
use LaravelLiberu\ControlPanelCommon\Services\IdProvider;

class Events extends IdProvider implements Sensorr
{
    public function __construct(private Api $api)
    {
    }

    public function value(): mixed
    {
        return (new Collection($this->api->events()))
            ->reduce(fn ($sum, $event) => $sum + $event[1]);
    }

    public function tooltip(): string
    {
        return 'errors in last 24 hours';
    }

    public function icon(): array
    {
        return ['fad', 'bug'];
    }

    public function class(): ?string
    {
        return null;
    }

    public function order(): int
    {
        return 100;
    }
}
