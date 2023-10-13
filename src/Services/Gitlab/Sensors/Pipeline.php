<?php

namespace LaravelLiberu\ControlPanel\Services\Gitlab\Sliberurs;

use Illuminate\Support\Str;
use LaravelLiberu\ControlPanel\Contracts\Api;
use LaravelLiberu\ControlPanelCommon\Contracts\Sliberur;
use LaravelLiberu\ControlPanelCommon\Services\IdProvider;

class Pipeline extends IdProvider implements Sliberur
{
    public function __construct(private Api $api)
    {
    }

    public function value(): mixed
    {
        $pipeline = $this->api->pipeline();

        return ! empty($pipeline)
            ? Str::ucfirst($pipeline[0]['status'])
            : 'N/A';
    }

    public function tooltip(): string
    {
        return 'last pipeline status';
    }

    public function icon(): array
    {
        return match ($this->value()) {
            'Running' => ['fad', 'play-circle'],
            'Pending' => ['fad', 'pause-circle'],
            'Success' => ['fad', 'check-circle'],
            'Failed' => ['fad', 'times-circle'],
            default => ['fad', 'ban'],
        };
    }

    public function class(): ?string
    {
        return match ($this->value()) {
            'Running' => 'has-text-info',
            'Pending' => 'has-text-warning',
            'Success' => 'has-text-success',
            'Failed' => 'has-text-danger',
            default => null,
        };
    }

    public function order(): int
    {
        return 300;
    }
}
