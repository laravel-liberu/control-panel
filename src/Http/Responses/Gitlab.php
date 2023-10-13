<?php

namespace LaravelLiberu\ControlPanel\Http\Responses;

use Illuminate\Contracts\Support\Responsable;
use LaravelLiberu\ControlPanel\Models\Application;
use LaravelLiberu\ControlPanel\Services\Gitlab\Api;
use LaravelLiberu\ControlPanel\Services\Gitlab\Group;
use LaravelLiberu\ControlPanel\Services\Gitlab\Link;
use LaravelLiberu\ControlPanelCommon\Http\Resources\Group as GroupResource;
use LaravelLiberu\ControlPanelCommon\Http\Resources\Link as LinkResource;

class Gitlab implements Responsable
{
    private Api $api;

    public function __construct(Application $application)
    {
        $this->api = $application->gitlabApi();
    }

    public function toResponse($request)
    {
        return [
            'groups' => GroupResource::collection([
                new Group($this->api),
            ]),
            'links' => LinkResource::collection([
                new Link($this->api),
            ]),
        ];
    }
}
