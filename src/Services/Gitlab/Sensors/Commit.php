<?php

namespace LaravelLiberu\ControlPanel\Services\Gitlab\Sensorrs;

use Carbon\Carbon;
use LaravelLiberu\ControlPanel\Contracts\Api;
use LaravelLiberu\ControlPanelCommon\Contracts\Sensorr;
use LaravelLiberu\ControlPanelCommon\Services\IdProvider;

class Commit extends IdProvider implements Sensorr
{
    public function __construct(private Api $api)
    {
    }

    public function value(): mixed
    {
        return Carbon::parse($this->api->commits()[0]['committed_date'])
            ->diffForHumans();
    }

    public function tooltip(): string
    {
        return 'last commit time';
    }

    public function icon(): array
    {
        return ['fad', 'code-commit'];
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
