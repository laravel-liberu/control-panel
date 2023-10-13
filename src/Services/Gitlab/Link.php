<?php

namespace LaravelLiberu\ControlPanel\Services\Gitlab;

use LaravelLiberu\ControlPanel\Contracts\Api;
use LaravelLiberu\ControlPanelCommon\Contracts\Link as Contract;

class Link implements Contract
{
    public function __construct(private Api $api)
    {
    }

    public function id(): string
    {
        return 'gitlab';
    }

    public function label(): string
    {
        return 'gitlab';
    }

    public function url(): string
    {
        return $this->api->project()['web_url'];
    }

    public function tooltip(): ?string
    {
        return 'click to visit the GitLab repository';
    }

    public function icon(): array
    {
        return ['fab', 'gitlab'];
    }

    public function order(): int
    {
        return 400;
    }
}
