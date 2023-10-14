<?php

namespace LaravelLiberu\ControlPanel\Services\Liberu;

use LaravelLiberu\ControlPanel\Contracts\LiberuApi;

class Liberu extends BaseApi implements LiberuApi
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
