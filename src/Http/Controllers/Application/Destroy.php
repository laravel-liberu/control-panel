<?php

namespace LaravelLiberu\ControlPanel\Http\Controllers\Application;

use Illuminate\Routing\Controller;
use LaravelLiberu\ControlPanel\Models\Application;

class Destroy extends Controller
{
    public function __invoke(Application $application)
    {
        $application->delete();

        return [
            'message' => __('The application was successfully deleted'),
            'redirect' => 'administration.applications.index',
        ];
    }
}
