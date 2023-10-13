<?php

namespace LaravelLiberu\ControlPanel\Http\Controllers\ControlPanel;

use Illuminate\Routing\Controller;
use LaravelLiberu\ControlPanel\Http\Requests\ValidateStatistics as Request;
use LaravelLiberu\ControlPanel\Models\Application;

class Statistics extends Controller
{
    public function __invoke(Request $request, Application $application)
    {
        return $application->api($request->validated())->statistics();
    }
}
