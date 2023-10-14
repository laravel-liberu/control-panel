<?php

namespace LaravelLiberu\ControlPanel\Contracts;

interface LiberuApi extends LegacyApi
{
    public function actions(): array;

    public function action(string $action);
}
