<?php

namespace LaravelLiberu\ControlPanel\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use LaravelLiberu\ControlPanel\Enums\ApplicationTypes;

class ValidateStatistics extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'type' => 'required|in:'.ApplicationTypes::keys()->implode(','),
            'startDate' => 'nullable|date',
            'endDate' => 'nullable|date',
        ];
    }

    private function nameUnique()
    {
        return Rule::unique('applications', 'name')
            ->ignore($this->route('application'));
    }
}
