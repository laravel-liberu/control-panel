<?php

use LaravelLiberu\ControlPanel\Http\Controllers\ControlPanel\Action;
use LaravelLiberu\ControlPanel\Http\Controllers\ControlPanel\Actions;
use LaravelLiberu\ControlPanel\Http\Controllers\ControlPanel\Gitlab;
use LaravelLiberu\ControlPanel\Http\Controllers\ControlPanel\Sentry;
use LaravelLiberu\ControlPanel\Http\Controllers\ControlPanel\Statistics;

Route::prefix('controlPanel')
    ->as('controlPanel.')
    ->group(function () {
        Route::get('statistics/{application}', Statistics::class)->name('statistics');
        Route::get('actions/{application}', Actions::class)->name('actions');
        Route::post('action/{action}/{application}', Action::class)->name('action');
        Route::get('gitlab/{application}', Gitlab::class)->name('gitlab');
        Route::get('sentry/{application}', Sentry::class)->name('sentry');
    });
