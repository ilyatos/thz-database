<?php

namespace App\Http\Requests\Experiment;

use App\Http\Requests\FormRequest;

final class CreateExperimentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'system_id' => 'integer',
        ];
    }
}
