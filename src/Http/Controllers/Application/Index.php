<?php

namespace LaravelLiberu\ControlPanel\Http\Controllers\Application;

use Illuminate\Routing\Controller;
use LaravelLiberu\ControlPanel\Http\Resources\Application as Resource;
use LaravelLiberu\ControlPanel\Models\Application;

class Index extends Controller
{
    public function __invoke()
    {
        return Resource::collection(
            Application::active()->ordered()->get()
        );
    }
}
