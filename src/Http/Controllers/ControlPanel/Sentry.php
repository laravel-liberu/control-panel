<?php

namespace LaravelLiberu\ControlPanel\Http\Controllers\ControlPanel;

use Illuminate\Routing\Controller;
use LaravelLiberu\ControlPanel\Exceptions\Sentry as Exception;
use LaravelLiberu\ControlPanel\Http\Responses\Sentry as Response;
use LaravelLiberu\ControlPanel\Models\Application;

class Sentry extends Controller
{
    public function __invoke(Application $application)
    {
        if ($application->sentry_project_uri === null) {
            throw Exception::unregistered();
        }

        return new Response($application);
    }
}
