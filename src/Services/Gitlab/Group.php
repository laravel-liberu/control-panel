<?php

namespace LaravelLiberu\ControlPanel\Services\Gitlab;

use LaravelLiberu\ControlPanel\Contracts\Api;
use LaravelLiberu\ControlPanel\Services\Gitlab\Sensors\Commit;
use LaravelLiberu\ControlPanel\Services\Gitlab\Sensors\Issues;
use LaravelLiberu\ControlPanel\Services\Gitlab\Sensors\Pipeline;
use LaravelLiberu\ControlPanelCommon\Contracts\Group as Contract;

class Group implements Contract
{
    public function __construct(private Api $api)
    {
    }

    public function id(): string
    {
        return 'repository';
    }

    public function label(): string
    {
        return 'Repository';
    }

    public function sensors(): array
    {
        return [
            new Commit($this->api),
            new Issues($this->api),
            new Pipeline($this->api),
        ];
    }

    public function order(): int
    {
        return 800;
    }
}
