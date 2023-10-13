<?php

use Illuminate\Support\Facades\Route;
use LaravelLiberu\ControlPanel\Http\Controllers\Application\Create;
use LaravelLiberu\ControlPanel\Http\Controllers\Application\Destroy;
use LaravelLiberu\ControlPanel\Http\Controllers\Application\Edit;
use LaravelLiberu\ControlPanel\Http\Controllers\Application\ExportExcel;
use LaravelLiberu\ControlPanel\Http\Controllers\Application\Index;
use LaravelLiberu\ControlPanel\Http\Controllers\Application\InitTable;
use LaravelLiberu\ControlPanel\Http\Controllers\Application\Store;
use LaravelLiberu\ControlPanel\Http\Controllers\Application\TableData;
use LaravelLiberu\ControlPanel\Http\Controllers\Application\Update;

Route::prefix('administration')
    ->as('administration.')
    ->group(function () {
        Route::prefix('applications')
            ->as('applications.')
            ->group(function () {
                Route::get('', Index::class)->name('index');
                Route::get('create', Create::class)->name('create');
                Route::post('', Store::class)->name('store');
                Route::get('{application}/edit', Edit::class)->name('edit');
                Route::patch('{application}', Update::class)->name('update');
                Route::delete('{application}', Destroy::class)->name('destroy');

                Route::get('initTable', InitTable::class)->name('initTable');
                Route::get('tableData', TableData::class)->name('tableData');
                Route::get('exportExcel', ExportExcel::class)->name('exportExcel');
            });
    });
