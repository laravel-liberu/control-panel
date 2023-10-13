<?php

namespace LaravelLiberu\ControlPanel\Tables\Builders;

use Illuminate\Database\Eloquent\Builder;
use LaravelLiberu\ControlPanel\Models\Application as Model;
use LaravelLiberu\Tables\Contracts\Table;

class Application implements Table
{
    private const TemplatePath = __DIR__.'/../Templates/applications.json';

    public function query(): Builder
    {
        return Model::selectRaw(
            'id, name, description, url, type, order_index, is_active'
        );
    }

    public function templatePath(): string
    {
        return static::TemplatePath;
    }
}
