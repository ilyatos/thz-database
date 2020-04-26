<?php

namespace App\Http\Requests\Experiment;

use App\Http\Requests\FormRequest;

class StoreExperimentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
           'system_id' => 'required|integer',
           'name' => 'required|alpha_dash',
           'description' => 'present',
       ];
    }
}
