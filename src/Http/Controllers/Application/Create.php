<?php

namespace LaravelLiberu\ControlPanel\Http\Controllers\Application;

use Illuminate\Routing\Controller;
use LaravelLiberu\ControlPanel\Forms\Builders\Application;

class Create extends Controller
{
    public function __invoke(Application $form)
    {
        return ['form' => $form->create()];
    }
}
