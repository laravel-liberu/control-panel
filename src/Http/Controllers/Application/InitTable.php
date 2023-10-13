<?php

namespace LaravelLiberu\ControlPanel\Http\Controllers\Application;

use Illuminate\Routing\Controller;
use LaravelLiberu\ControlPanel\Tables\Builders\Application;
use LaravelLiberu\Tables\Traits\Init;

class InitTable extends Controller
{
    use Init;

    protected string $tableClass = Application::class;
}
