<?php

namespace LaravelLiberu\ControlPanel\Http\Controllers\Application;

use Illuminate\Routing\Controller;
use LaravelLiberu\ControlPanel\Forms\Builders\Application;
use LaravelLiberu\ControlPanel\Models\Application as Model;

class Edit extends Controller
{
    public function __invoke(Model $application, Application $form)
    {
        return ['form' => $form->edit($application)];
    }
}
