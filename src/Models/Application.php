<?php

namespace LaravelLiberu\ControlPanel\Models;

use Illuminate\Database\Eloquent\Model;
use LaravelLiberu\ControlPanel\Contracts\LegacyApi;
use LaravelLiberu\ControlPanel\Enums\ApplicationTypes;
use LaravelLiberu\ControlPanel\Services\Application\Link as ApplicationLink;
use LaravelLiberu\ControlPanel\Services\Enso\Enso;
use LaravelLiberu\ControlPanel\Services\Enso\Legacy;
use LaravelLiberu\ControlPanel\Services\Envoyer\Link as EnvoyerLink;
use LaravelLiberu\ControlPanel\Services\Forge\Link as ForgeLink;
use LaravelLiberu\ControlPanel\Services\Gitlab\Api as GitlabApi;
use LaravelLiberu\ControlPanel\Services\Sentry\Api as SentryApi;
use LaravelLiberu\Files\Http\Resources\Collection;
use LaravelLiberu\Helpers\Traits\ActiveState;
use LaravelLiberu\Tables\Traits\TableCache;

class Application extends Model
{
    use ActiveState, TableCache;

    protected $guarded = ['id'];

    protected $hidden = ['token'];

    protected $casts = [
        'is_active' => 'boolean', 'created_at' => 'datetime:d-m-Y',
    ];

    public function scopeOrdered($query)
    {
        $query->orderBy('order_index');
    }

    public function scopeActive($query)
    {
        $query->whereIsActive(1);
    }

    public function api(array $request): LegacyApi
    {
        return $this->type === ApplicationTypes::Enso
            ? new Enso($this, $request)
            : new Legacy($this, $request);
    }

    public function sentryApi(): SentryApi
    {
        return new SentryApi($this);
    }

    public function gitlabApi(): GitlabApi
    {
        return new GitlabApi($this);
    }

    public function links(): array
    {
        //TODO review this
        // return [
        //     new ForgeLink($this), new EnvoyerLink($this), new ApplicationLink($this),
        // ];

        return (new Collection([new ApplicationLink($this)]))
            ->when($this->forge_url, fn ($links) => $links->push(new ForgeLink($this)))
            ->when($this->envoyer_url, fn ($links) => $links->push(new EnvoyerLink($this)))
            ->toArray();
    }
}
