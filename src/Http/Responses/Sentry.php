<?php

namespace LaravelLiberu\ControlPanel\Http\Responses;

use Illuminate\Contracts\Support\Responsable;
use LaravelLiberu\ControlPanel\Models\Application;
use LaravelLiberu\ControlPanel\Services\Sentry\Group;
use LaravelLiberu\ControlPanel\Services\Sentry\Link;
use LaravelLiberu\ControlPanelCommon\Http\Resources\Group as GroupResource;
use LaravelLiberu\ControlPanelCommon\Http\Resources\Link as LinkResource;

class Sentry implements Responsable
{
    private Application $application;

    public function __construct(Application $application)
    {
        $this->application = $application;
    }

    public function toResponse($request)
    {
        return [
            'groups' => GroupResource::collection([
                new Group($this->application->sentryApi()),
            ]),
            'links' => LinkResource::collection([
                new Link($this->application),
            ]),
        ];
    }
}
