<?php

namespace LaravelLiberu\ControlPanel\Services\Gitlab\Sliberurs;

use Carbon\Carbon;
use LaravelLiberu\ControlPanel\Contracts\Api;
use LaravelLiberu\ControlPanelCommon\Contracts\Sliberur;
use LaravelLiberu\ControlPanelCommon\Services\IdProvider;

class Commit extends IdProvider implements Sliberur
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
