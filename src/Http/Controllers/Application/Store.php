<?php

namespace LaravelLiberu\ControlPanel\Http\Controllers\Application;

use Illuminate\Routing\Controller;
use LaravelLiberu\ControlPanel\Http\Requests\ValidateApplication;
use LaravelLiberu\ControlPanel\Models\Application;

class Store extends Controller
{
    public function __invoke(ValidateApplication $request, Application $application)
    {
        $application->fill($request->validated());

        $application->token = $request->get('token');

        $application->save();

        return [
            'message' => __('The application was successfully created'),
            'redirect' => 'administration.applications.edit',
            'param' => ['application' => $application->id],
        ];
    }
}
