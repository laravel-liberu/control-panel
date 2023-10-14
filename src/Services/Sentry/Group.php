<?php

namespace LaravelLiberu\ControlPanel\Services\Sentry;

use LaravelLiberu\ControlPanel\Contracts\Api;
use LaravelLiberu\ControlPanel\Services\Sentry\Sensorrs\Events;
use LaravelLiberu\ControlPanelCommon\Contracts\Group as Contract;

class Group implements Contract
{
    public function __construct(private Api $api)
    {
    }

    public function id(): string
    {
        return 'errors';
    }

    public function label(): string
    {
        return 'Errors';
    }

    public function sliberurs(): array
    {
        return [new Events($this->api)];
    }

    public function order(): int
    {
        return 900;
    }
}
