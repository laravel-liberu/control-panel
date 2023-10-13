<?php

namespace LaravelLiberu\ControlPanel\Http\Controllers\ControlPanel;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use LaravelLiberu\ControlPanel\Models\Application;

class Actions extends Controller
{
    public function __invoke(Request $request, Application $application)
    {
        return $application->api($request->all())->actions();
    }
}
