<?php

namespace LaravelLiberu\ControlPanel\Services\Enso;

use LaravelLiberu\ControlPanel\Contracts\LegacyApi;

class Legacy extends BaseApi implements LegacyApi
{
    public function statistics(): array
    {
        return $this->response('GET', 'api/statistics');
    }
}
