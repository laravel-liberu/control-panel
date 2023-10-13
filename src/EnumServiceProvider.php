<?php

namespace LaravelLiberu\ControlPanel;

use LaravelLiberu\ControlPanel\Enums\ApplicationTypes;
use LaravelLiberu\Enums\EnumServiceProvider as ServiceProvider;

class EnumServiceProvider extends ServiceProvider
{
    public $register = [
        'applicationTypes' => ApplicationTypes::class,
    ];
}
