<?php

namespace LaravelLiberu\ControlPanel\Http\Controllers\ControlPanel;

use Illuminate\Routing\Controller;
use LaravelLiberu\ControlPanel\Exceptions\Gitlab as Exception;
use LaravelLiberu\ControlPanel\Http\Responses\Gitlab as Response;
use LaravelLiberu\ControlPanel\Models\Application;

class Gitlab extends Controller
{
    public function __invoke(Application $application)
    {
        if ($application->gitlab_project_id === null) {
            throw Exception::unregistered();
        }

        return new Response($application);
    }
}
