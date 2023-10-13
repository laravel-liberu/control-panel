<?php

namespace LaravelLiberu\ControlPanel\Http\Controllers\Application;

use Illuminate\Routing\Controller;
use LaravelLiberu\ControlPanel\Tables\Builders\Application;
use LaravelLiberu\Tables\Traits\Data;

class TableData extends Controller
{
    use Data;

    protected string $tableClass = Application::class;
}
