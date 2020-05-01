<?php

declare(strict_types=1);

namespace App\Http\Requests\Experiment;

use App\Http\Requests\FormRequest;
use App\Services\Experiment\CreateExperimentDto;

class StoreExperimentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
           'system_id' => 'required|integer',
           'name' => 'required|max:255',
           'description' => 'present|nullable',
       ];
    }

    public function getDto(): CreateExperimentDto
    {
        return new CreateExperimentDto(
            $this->input('system_id'),
            $this->input('name'),
            $this->input('description')
        );
    }
}
