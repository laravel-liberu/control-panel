<?php

namespace LaravelLiberu\ControlPanel\Services\Enso;

use LaravelLiberu\ControlPanel\Contracts\EnsoApi;

class Enso extends BaseApi implements EnsoApi
{
    public function statistics(): array
    {
        return $this->response('GET', 'apis/controlPanel/statistics');
    }

    public function actions(): array
    {
        return $this->response('GET', 'apis/controlPanel/actions');
    }

    public function action($action)
    {
        return $this->response('POST', "apis/controlPanel/{$action}");
    }
}
