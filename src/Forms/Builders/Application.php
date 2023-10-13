<?php

namespace LaravelLiberu\ControlPanel\Forms\Builders;

use LaravelLiberu\ControlPanel\Enums\ApplicationTypes;
use LaravelLiberu\ControlPanel\Models\Application as Model;
use LaravelLiberu\Forms\Services\Form;
use LaravelLiberu\Helpers\Services\Obj;

class Application
{
    private const TemplatePath = __DIR__.'/../Templates/application.json';

    private Form $form;

    public function __construct()
    {
        $this->form = (new Form($this->templatePath()))
            ->options('type', ApplicationTypes::select());
    }

    public function create(): Obj
    {
        return $this->form->create();
    }

    public function edit(Model $application): Obj
    {
        return $this->form->actions(['create', 'update', 'destroy'])
            ->value('token', null)
            ->edit($application);
    }

    protected function templatePath(): string
    {
        return self::TemplatePath;
    }
}
